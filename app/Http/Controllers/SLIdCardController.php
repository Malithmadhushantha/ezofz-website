<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IdConversionExport;
use App\Imports\IdConversionImport;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SLIdCardController extends Controller
{
    /**
     * Download template Excel file
     */
    public function downloadTemplate(Request $request)
    {
        try {
            $request->validate([
                'format' => 'required|in:old-format,new-format'
            ]);

            $format = $request->format;

            // Create new spreadsheet
            $spreadsheet = new Spreadsheet();
            $worksheet = $spreadsheet->getActiveSheet();

            // Set header
            $worksheet->setCellValue('A1', 'ID_Number');

            // Add sample data
            if ($format === 'old-format') {
                $sampleData = [
                    '983211429V',
                    '874567890V',
                    '950123456V',
                    '921015678V',
                    '851201234V'
                ];
                $filename = 'old_format_template.xlsx';
            } else {
                $sampleData = [
                    '199832101429',
                    '198745601234',
                    '199501234567',
                    '199210156789',
                    '198512012345'
                ];
                $filename = 'new_format_template.xlsx';
            }

            // Add sample data to worksheet
            foreach ($sampleData as $index => $data) {
                $worksheet->setCellValue('A' . ($index + 2), $data);
            }

            // Style the header
            $worksheet->getStyle('A1')->getFont()->setBold(true);
            $worksheet->getStyle('A1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('4F81BD');
            $worksheet->getStyle('A1')->getFont()->getColor()->setRGB('FFFFFF');

            // Auto-size columns
            $worksheet->getColumnDimension('A')->setAutoSize(true);

            // Add instructions in column B
            $worksheet->setCellValue('B1', 'Instructions');
            $worksheet->setCellValue('B2', 'Replace the sample ID numbers with your actual data');
            $worksheet->setCellValue('B3', 'Keep the header "ID_Number" in column A');
            $worksheet->setCellValue('B4', 'You can add more rows as needed');
            $worksheet->setCellValue('B5', 'Save the file and upload it to the bulk converter');

            $worksheet->getStyle('B1')->getFont()->setBold(true);
            $worksheet->getStyle('B1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('28A745');
            $worksheet->getStyle('B1')->getFont()->getColor()->setRGB('FFFFFF');
            $worksheet->getColumnDimension('B')->setAutoSize(true);

            // Create temporary file
            $tempPath = storage_path('app/temp');
            if (!is_dir($tempPath)) {
                mkdir($tempPath, 0755, true);
            }

            $filePath = $tempPath . '/' . $filename;
            $writer = new Xlsx($spreadsheet);
            $writer->save($filePath);

            return response()->download($filePath, $filename, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            Log::error('Template download error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to generate template: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Analyze uploaded Excel file to get column headers
     */
    public function analyzeFile(Request $request)
    {
        try {
            // Check if ZIP extension is available
            if (!extension_loaded('zip')) {
                return $this->handleCsvAnalysis($request);
            }

            // Validate request with custom validation
            $request->validate([
                'excel_file' => 'required|file|max:10240', // 10MB max
            ]);

            $file = $request->file('excel_file');

            // Custom file validation
            if (!$this->isValidExcelFile($file)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please upload a valid Excel or CSV file (.xlsx, .xls, .csv)'
                ], 422);
            }

            // Read the Excel file
            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();

            // Get the first row (headers)
            $headerRow = $worksheet->rangeToArray('A1:' . $worksheet->getHighestColumn() . '1')[0];

            // Clean up headers and remove empty cells
            $columns = [];
            foreach ($headerRow as $index => $header) {
                if (!empty(trim($header))) {
                    $columns[] = [
                        'index' => $index,
                        'name' => trim($header)
                    ];
                } elseif (count($columns) === 0) {
                    // If first columns are empty, use generic names
                    $columns[] = [
                        'index' => $index,
                        'name' => 'Column ' . chr(65 + $index) // A, B, C, etc.
                    ];
                }
            }

            // If no headers found, create generic column names
            if (empty($columns)) {
                $highestColumn = $worksheet->getHighestColumn();
                $columnNumber = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

                for ($i = 0; $i < min($columnNumber, 10); $i++) { // Limit to 10 columns
                    $columns[] = [
                        'index' => $i,
                        'name' => 'Column ' . chr(65 + $i)
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'columns' => $columns,
                'message' => 'File analyzed successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('File analysis error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Unable to analyze file: ' . $e->getMessage()
            ], 500);
        }
    }    /**
     * Handle bulk ID conversion from uploaded Excel file
     */
    public function bulkConvert(Request $request)
    {
        try {
            // Check if ZIP extension is available
            if (!extension_loaded('zip')) {
                return $this->handleCsvConversion($request);
            }

            // Validate request with custom validation
            $request->validate([
                'excel_file' => 'required|file|max:10240', // 10MB max
                'column_index' => 'required|integer|min:0',
                'conversion_type' => 'required|in:bulk-old-to-new,bulk-new-to-old'
            ]);

            $file = $request->file('excel_file');

            // Custom file validation
            if (!$this->isValidExcelFile($file)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please upload a valid Excel or CSV file (.xlsx, .xls, .csv)'
                ], 422);
            }

            $columnIndex = (int) $request->column_index;
            $conversionType = $request->conversion_type;

            // Read the Excel file
            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();

            // Remove header row if exists
            if (count($data) > 0) {
                $headers = array_shift($data);
            }

            $results = [];
            $totalProcessed = 0;
            $successfulConversions = 0;
            $failedConversions = 0;

            foreach ($data as $rowIndex => $row) {
                if (!isset($row[$columnIndex]) || empty(trim($row[$columnIndex]))) {
                    continue; // Skip empty cells
                }

                $idNumber = trim($row[$columnIndex]);
                $totalProcessed++;

                try {
                    if ($conversionType === 'bulk-old-to-new') {
                        $convertedId = $this->convertOldToNew($idNumber);
                    } else {
                        $convertedId = $this->convertNewToOld($idNumber);
                    }

                    $results[] = [
                        'row_number' => $rowIndex + 2, // +2 because we removed header and arrays are 0-indexed
                        'original_id' => $idNumber,
                        'converted_id' => $convertedId,
                        'status' => 'Success',
                        'error' => null
                    ];
                    $successfulConversions++;

                } catch (\Exception $e) {
                    $results[] = [
                        'row_number' => $rowIndex + 2,
                        'original_id' => $idNumber,
                        'converted_id' => null,
                        'status' => 'Failed',
                        'error' => $e->getMessage()
                    ];
                    $failedConversions++;
                }
            }

            // Generate result Excel file
            $resultSpreadsheet = new Spreadsheet();
            $resultSheet = $resultSpreadsheet->getActiveSheet();

            // Set headers
            $resultSheet->setCellValue('A1', 'Row Number');
            $resultSheet->setCellValue('B1', 'Original ID');
            $resultSheet->setCellValue('C1', 'Converted ID');
            $resultSheet->setCellValue('D1', 'Status');
            $resultSheet->setCellValue('E1', 'Error Message');

            // Add data
            $rowNum = 2;
            foreach ($results as $result) {
                $resultSheet->setCellValue('A' . $rowNum, $result['row_number']);
                $resultSheet->setCellValue('B' . $rowNum, $result['original_id']);
                $resultSheet->setCellValue('C' . $rowNum, $result['converted_id'] ?? '');
                $resultSheet->setCellValue('D' . $rowNum, $result['status']);
                $resultSheet->setCellValue('E' . $rowNum, $result['error'] ?? '');
                $rowNum++;
            }

            // Style the header row
            $headerRange = 'A1:E1';
            $resultSheet->getStyle($headerRange)->getFont()->setBold(true);
            $resultSheet->getStyle($headerRange)->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setRGB('4F81BD');
            $resultSheet->getStyle($headerRange)->getFont()->getColor()->setRGB('FFFFFF');

            // Auto-size columns
            foreach (range('A', 'E') as $col) {
                $resultSheet->getColumnDimension($col)->setAutoSize(true);
            }

            // Generate filename
            $timestamp = now()->format('Y-m-d_H-i-s');
            $filename = "id_conversion_results_{$timestamp}.xlsx";
            $filePath = storage_path("app/temp/{$filename}");

            // Ensure temp directory exists
            if (!is_dir(storage_path('app/temp'))) {
                mkdir(storage_path('app/temp'), 0755, true);
            }

            // Save the file
            $writer = new Xlsx($resultSpreadsheet);
            $writer->save($filePath);

            return response()->json([
                'success' => true,
                'message' => 'Conversion completed successfully',
                'data' => [
                    'total' => $totalProcessed,
                    'successful' => $successfulConversions,
                    'failed' => $failedConversions,
                    'download_url' => route('tools.download-conversion-result', ['filename' => $filename])
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Bulk ID conversion error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred during conversion: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Download conversion result file
     */
    public function downloadResult($filename)
    {
        $filePath = storage_path("app/temp/{$filename}");

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        // Clean up old files (older than 1 hour)
        $this->cleanupOldFiles();

        return response()->download($filePath, $filename)->deleteFileAfterSend(true);
    }

    /**
     * Convert old format ID to new format
     */
    private function convertOldToNew($oldId)
    {
        $oldId = trim(strtoupper($oldId));

        if (!preg_match('/^([0-9]{9})[VvXx]$/', $oldId)) {
            throw new \Exception('Invalid old format ID number');
        }

        $number = substr($oldId, 0, 9);
        $year = (int) substr($number, 0, 2);
        $dayOfYear = substr($number, 2, 3);
        $serialNumber = (int) substr($number, 5, 4);

        // Determine full year
        $fullYear = $year < 50 ? 2000 + $year : 1900 + $year;

        // Convert serial number (add 50000 for females)
        $newSerialNumber = $serialNumber >= 5000 ?
            str_pad($serialNumber - 5000 + 50000, 5, '0', STR_PAD_LEFT) :
            str_pad($serialNumber, 5, '0', STR_PAD_LEFT);

        return $fullYear . $dayOfYear . $newSerialNumber;
    }

    /**
     * Convert new format ID to old format
     */
    private function convertNewToOld($newId)
    {
        $newId = trim($newId);

        if (!preg_match('/^([0-9]{12})$/', $newId)) {
            throw new \Exception('Invalid new format ID number');
        }

        $year = (int) substr($newId, 0, 4);
        $dayOfYear = substr($newId, 4, 3);
        $serialNumber = (int) substr($newId, 7, 5);

        // Convert year to 2 digits
        $shortYear = str_pad($year % 100, 2, '0', STR_PAD_LEFT);

        // Convert serial number (subtract 50000 for females and add 5000)
        $oldSerialNumber = $serialNumber >= 50000 ?
            str_pad($serialNumber - 50000 + 5000, 4, '0', STR_PAD_LEFT) :
            str_pad($serialNumber, 4, '0', STR_PAD_LEFT);

        return $shortYear . $dayOfYear . $oldSerialNumber . 'V';
    }

    /**
     * Clean up old temporary files
     */
    private function cleanupOldFiles()
    {
        $tempDir = storage_path('app/temp');
        if (!is_dir($tempDir)) {
            return;
        }

        $files = glob($tempDir . '/id_conversion_results_*.xlsx');
        $oneHourAgo = time() - 3600;

        foreach ($files as $file) {
            if (filemtime($file) < $oneHourAgo) {
                unlink($file);
            }
        }
    }

    /**
     * Validate if uploaded file is a valid Excel/CSV file
     */
    private function isValidExcelFile($file)
    {
        // Check file extension
        $allowedExtensions = ['xlsx', 'xls', 'csv'];
        $extension = strtolower($file->getClientOriginalExtension());

        if (!in_array($extension, $allowedExtensions)) {
            return false;
        }

        // Check MIME types (more comprehensive list)
        $allowedMimeTypes = [
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
            'application/vnd.ms-excel', // .xls
            'application/excel', // .xls alternative
            'application/x-excel', // .xls alternative
            'application/x-msexcel', // .xls alternative
            'text/csv', // .csv
            'text/plain', // .csv alternative
            'application/csv', // .csv alternative
            'application/x-csv', // .csv alternative
        ];

        $mimeType = $file->getMimeType();

        // If MIME type doesn't match but extension is valid, try to read the file
        if (!in_array($mimeType, $allowedMimeTypes)) {
            // For CSV files, MIME type detection can be unreliable
            if ($extension === 'csv') {
                return true; // Allow CSV files regardless of MIME type
            }
            return false;
        }

        return true;
    }

    /**
     * Handle CSV file analysis when ZIP extension is not available
     */
    private function handleCsvAnalysis(Request $request)
    {
        try {
            $request->validate([
                'excel_file' => 'required|file|max:10240',
            ]);

            $file = $request->file('excel_file');

            // Check if it's a CSV file
            if (strtolower($file->getClientOriginalExtension()) !== 'csv') {
                return response()->json([
                    'success' => false,
                    'message' => 'ZIP extension is not available. Please upload a CSV file instead of Excel files.'
                ], 422);
            }

            // Read CSV headers
            $columns = [];
            if (($handle = fopen($file->getPathname(), "r")) !== FALSE) {
                if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    foreach ($data as $index => $header) {
                        if (!empty(trim($header))) {
                            $columns[] = [
                                'index' => $index,
                                'name' => trim($header)
                            ];
                        } else {
                            $columns[] = [
                                'index' => $index,
                                'name' => 'Column ' . chr(65 + $index)
                            ];
                        }
                    }
                }
                fclose($handle);
            }

            if (empty($columns)) {
                $columns = [
                    ['index' => 0, 'name' => 'Column A'],
                    ['index' => 1, 'name' => 'Column B'],
                    ['index' => 2, 'name' => 'Column C']
                ];
            }

            return response()->json([
                'success' => true,
                'columns' => $columns,
                'message' => 'CSV file analyzed successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('CSV analysis error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to analyze CSV file: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle CSV bulk conversion when ZIP extension is not available
     */
    private function handleCsvConversion(Request $request)
    {
        try {
            $request->validate([
                'excel_file' => 'required|file|max:10240',
                'column_index' => 'required|integer|min:0',
                'conversion_type' => 'required|in:bulk-old-to-new,bulk-new-to-old'
            ]);

            $file = $request->file('excel_file');

            // Check if it's a CSV file
            if (strtolower($file->getClientOriginalExtension()) !== 'csv') {
                return response()->json([
                    'success' => false,
                    'message' => 'ZIP extension is not available. Please upload a CSV file instead of Excel files.'
                ], 422);
            }

            $columnIndex = (int) $request->column_index;
            $conversionType = $request->conversion_type;

            $results = [];
            $totalProcessed = 0;
            $successfulConversions = 0;
            $failedConversions = 0;

            // Read CSV file
            if (($handle = fopen($file->getPathname(), "r")) !== FALSE) {
                $rowIndex = 0;
                // Skip header row
                fgetcsv($handle, 1000, ",");

                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if (!isset($data[$columnIndex]) || empty(trim($data[$columnIndex]))) {
                        continue;
                    }

                    $idNumber = trim($data[$columnIndex]);
                    $totalProcessed++;

                    try {
                        if ($conversionType === 'bulk-old-to-new') {
                            $convertedId = $this->convertOldToNew($idNumber);
                        } else {
                            $convertedId = $this->convertNewToOld($idNumber);
                        }

                        $results[] = [
                            'row_number' => $rowIndex + 2,
                            'original_id' => $idNumber,
                            'converted_id' => $convertedId,
                            'status' => 'Success',
                            'error' => null
                        ];
                        $successfulConversions++;

                    } catch (\Exception $e) {
                        $results[] = [
                            'row_number' => $rowIndex + 2,
                            'original_id' => $idNumber,
                            'converted_id' => null,
                            'status' => 'Failed',
                            'error' => $e->getMessage()
                        ];
                        $failedConversions++;
                    }
                    $rowIndex++;
                }
                fclose($handle);
            }

            // Generate CSV response
            $timestamp = now()->format('Y-m-d_H-i-s');
            $filename = "id_conversion_results_{$timestamp}.csv";

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            return response()->stream(function () use ($results) {
                $output = fopen('php://output', 'w');

                // Write header
                fputcsv($output, ['Row Number', 'Original ID', 'Converted ID', 'Status', 'Error Message']);

                // Write data
                foreach ($results as $result) {
                    fputcsv($output, [
                        $result['row_number'],
                        $result['original_id'],
                        $result['converted_id'] ?? '',
                        $result['status'],
                        $result['error'] ?? ''
                    ]);
                }

                fclose($output);
            }, 200, $headers);

        } catch (\Exception $e) {
            Log::error('CSV bulk conversion error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during CSV conversion: ' . $e->getMessage()
            ], 500);
        }
    }
}
