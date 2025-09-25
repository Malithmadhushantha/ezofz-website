<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SinhalaConverter;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NameConversionExport;
use App\Imports\NameConversionImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class NameConverterController extends Controller
{
    protected $converter;

    /**
     * Create a new controller instance.
     *
     * @param SinhalaConverter $converter
     * @return void
     */
    public function __construct(SinhalaConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Check if ZIP extension is available
     *
     * @return bool
     */
    private function isZipExtensionAvailable()
    {
        return extension_loaded('zip');
    }

    /**
     * Display the name converter page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('tools.name-converter');
    }

    /**
     * Convert a single name
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function convertSingle(Request $request)
    {
        try {
            // Log incoming request data for debugging
            Log::info('Name conversion request:', $request->all());

            $request->validate([
                'name' => 'required|string|max:255',
                'conversionType' => 'required|in:full,initials,englishInitials',
            ]);

            $name = $request->name;
            $type = $request->conversionType;

            $result = $this->performConversion($name, $type);

            // Log the result
            Log::info('Name conversion result:', ['original' => $name, 'converted' => $result]);

            return response()->json([
                'original' => $name,
                'converted' => $result,
                'debug' => 'Conversion successful'
            ]);
        } catch (\Exception $e) {
            // Log any exceptions
            Log::error('Name conversion error: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => $e->getMessage(),
                'debug' => 'Exception caught in convertSingle'
            ], 500);
        }
    }

    /**
     * Handle file upload and convert names in bulk
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function convertBulk(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
            'conversionType' => 'required|in:full,initials,englishInitials',
        ]);

        try {
            $path = $request->file('file')->store('temp');
            $type = $request->conversionType;
            $results = [];

            // Check file extension to determine processing method
            $fileExtension = strtolower($request->file('file')->getClientOriginalExtension());

            if ($fileExtension === 'csv') {
                // Process CSV file
                $results = $this->processCsvFile($path, $type);
            } else {
                // Check if ZIP extension is available for Excel processing
                if (!$this->isZipExtensionAvailable()) {
                    // ZIP extension not available, show error for Excel files
                    Storage::delete($path);
                    return back()->with('error', 'Excel processing is currently unavailable due to missing ZIP extension. Please convert your Excel file to CSV format and upload it instead.');
                } else {
                    // Try to process as Excel file
                    try {
                        $data = Excel::toArray(new NameConversionImport, $path);

                    // Process the data (the import class already skips to row 2)
                    if (!empty($data) && isset($data[0]) && count($data[0]) > 0) {
                        foreach ($data[0] as $row) {
                            // Check if the name column has a value (should be in column A)
                            if (!empty($row) && isset($row[0]) && !empty($row[0])) {
                                $name = trim($row[0]);

                                // Skip any rows with example indicators
                                if (stripos($name, 'example') === false) {
                                    $converted = $this->performConversion($name, $type);
                                    $results[] = [
                                        'original' => $name,
                                        'converted' => $converted
                                    ];
                                }
                            }
                        }
                    }
                    } catch (\Exception $e) {
                        // If Excel processing fails, try CSV processing
                        Log::warning('Excel processing failed, trying CSV: ' . $e->getMessage());
                        $results = $this->processCsvFile($path, $type);
                    }
                }
            }

            // Check if we have any results
            if (empty($results)) {
                Storage::delete($path);
                return back()->with('error', 'No valid names found in the uploaded file. Please check the file and try again.');
            }

            // Generate and download the output file
            Storage::delete($path);

            // Add flash message for next visit
            session()->flash('success', 'Names converted successfully! Downloading the results file...');

            // Try to return Excel file, fall back to CSV if needed
            if (!$this->isZipExtensionAvailable()) {
                // ZIP extension not available, return CSV
                return $this->returnCsvResults($results);
            }

            try {
                return Excel::download(
                    new NameConversionExport($results),
                    'converted_names_' . date('Y-m-d_His') . '.xlsx'
                );
            } catch (\Exception $e) {
                // Fall back to CSV output
                Log::warning('Excel output failed, returning CSV: ' . $e->getMessage());
                return $this->returnCsvResults($results);
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Error processing file: ' . $e->getMessage());
        }
    }

    /**
     * Download template file for bulk conversion
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadTemplate()
    {
        try {
            // Check if ZIP extension is available for Excel files first
            if (!$this->isZipExtensionAvailable()) {
                // Generate CSV template when ZIP extension is not available
                $filename = 'name_converter_template.csv';
                $headers = [
                    'Content-Type' => 'text/csv',
                    'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                ];

                return response()->stream(function () {
                    $output = fopen('php://output', 'w');

                    // Write simple template with just headers
                    fputcsv($output, ['Original Names', 'Converted Names']);

                    fclose($output);
                }, 200, $headers);
            }

            // Try to create Excel template - simplified structure
            $templateData = [
                ['Original Names', 'Converted Names'], // Headers in row 1
            ];

            try {
                // Attempt to create Excel file
                return Excel::download(
                    new NameConversionExport($templateData, true),
                    'name_converter_template.xlsx'
                );
            } catch (\Exception $e) {
                // If Excel fails, fall back to CSV
                Log::warning('Excel template generation failed, falling back to CSV: ' . $e->getMessage());

                $filename = 'name_converter_template.csv';
                $headers = [
                    'Content-Type' => 'text/csv',
                    'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                ];

                return response()->stream(function () {
                    $output = fopen('php://output', 'w');

                    // Write simple template with just headers
                    fputcsv($output, ['Original Names', 'Converted Names']);

                    fclose($output);
                }, 200, $headers);
            }

        } catch (\Exception $e) {
            Log::error('Template download error: ' . $e->getMessage());
            return back()->with('error', 'Error generating template: ' . $e->getMessage());
        }
    }    /**
     * Process CSV file and return results
     *
     * @param string $path
     * @param string $type
     * @return array
     */
    private function processCsvFile($path, $type)
    {
        $results = [];
        $fullPath = Storage::path($path);

        if (($handle = fopen($fullPath, "r")) !== FALSE) {
            $rowCount = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $rowCount++;

                // Skip header row (first row in template)
                if ($rowCount <= 1) {
                    continue;
                }

                // Check if name column has data
                if (!empty($data[0]) && trim($data[0]) !== '') {
                    $name = trim($data[0]);
                    $convertedName = $this->performConversion($name, $type);

                    $results[] = [
                        'original' => $name,
                        'converted' => $convertedName
                    ];
                }
            }
            fclose($handle);
        }

        return $results;
    }

    /**
     * Return CSV results when Excel output fails
     *
     * @param array $results
     * @return \Illuminate\Http\Response
     */
    private function returnCsvResults($results)
    {
        $filename = 'converted_names_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->stream(function () use ($results) {
            $output = fopen('php://output', 'w');

            // Write header
            fputcsv($output, ['Original Name', 'Converted Name']);

            // Write data
            foreach ($results as $result) {
                fputcsv($output, [$result['original'], $result['converted']]);
            }

            fclose($output);
        }, 200, $headers);
    }

    /**
     * Perform the actual name conversion based on type
     *
     * @param string $name
     * @param string $type
     * @return string
     */
    protected function performConversion($name, $type)
    {
        switch ($type) {
            case 'full':
                return $this->converter->englishToSinhala($name);

            case 'initials':
                return $this->converter->englishToSinhalaInitialsLastName($name);

            case 'englishInitials':
                return $this->converter->englishInitialsToSinhalaInitials($name);

            default:
                return $name;
        }
    }

    /**
     * Handle CSV file processing when ZIP extension is not available
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    private function handleCsvFallback(Request $request)
    {
        try {
            $file = $request->file('file');
            $type = $request->conversionType;

            // Check if it's a CSV file
            if (strtolower($file->getClientOriginalExtension()) !== 'csv') {
                return back()->with('error', 'Excel processing is currently unavailable. Please download and use the CSV template instead. All conversion features work the same way with CSV files.');
            }

            $results = [];
            $path = $file->getPathname();

            // Read CSV file
            if (($handle = fopen($path, "r")) !== FALSE) {
                $rowCount = 0;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $rowCount++;

                    // Skip header row (first row in template)
                    if ($rowCount <= 1) {
                        continue;
                    }

                    // Check if name column has data
                    if (!empty($data[0]) && trim($data[0]) !== '') {
                        $name = trim($data[0]);
                        $convertedName = $this->performConversion($name, $type);

                        $results[] = [
                            'original' => $name,
                            'converted' => $convertedName
                        ];
                    }
                }
                fclose($handle);
            }

            if (empty($results)) {
                return back()->with('error', 'No valid names found in the uploaded file. Please make sure you have names in the first column starting from row 2.');
            }

            // Generate CSV response
            $filename = 'converted_names_' . date('Y-m-d_H-i-s') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            return response()->stream(function () use ($results) {
                $output = fopen('php://output', 'w');

                // Write header
                fputcsv($output, ['Original Name', 'Converted Name']);

                // Write data
                foreach ($results as $result) {
                    fputcsv($output, [$result['original'], $result['converted']]);
                }

                fclose($output);
            }, 200, $headers);

        } catch (\Exception $e) {
            Log::error('CSV Fallback Error: ' . $e->getMessage());
            return back()->with('error', 'Error processing CSV file: ' . $e->getMessage());
        }
    }
}
