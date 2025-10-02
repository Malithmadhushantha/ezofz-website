<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NameConversionExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $data;
    protected $isTemplate;

    public function __construct(array $data, $isTemplate = false)
    {
        $this->data = $data;
        $this->isTemplate = $isTemplate;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        if ($this->isTemplate) {
            // For template, return the data as-is (should be headers only)
            return $this->data;
        }

        $results = [];
        foreach ($this->data as $row) {
            // Add data with original name and converted name
            if (isset($row['original']) && isset($row['converted'])) {
                $results[] = [
                    $row['original'],
                    $row['converted']
                ];
            }
        }

        return $results;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // No additional headings needed - data already contains headers for template
        return [];
    }

    /**
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        if ($this->isTemplate) {
            // Simple template styling - just style the header row
            $sheet->getStyle('A1:B1')->getFont()->setBold(true);
            $sheet->getStyle('A1:B1')->getFill()
                  ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                  ->getStartColor()->setARGB('FFE6F3FF');
            $sheet->getStyle('A1:B1')->getAlignment()
                  ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            // Add border to header row
            $sheet->getStyle('A1:B1')->getBorders()->getAllBorders()
                  ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            // Auto-size columns
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);

            return [];
        }

        // Regular result styling
        // Add title and instructions
        $sheet->insertNewRowBefore(1, 3);
        $sheet->setCellValue('A1', 'EZofz.lk Name Conversion Results');
        $sheet->mergeCells('A1:B1');
        $sheet->setCellValue('A2', 'Converted names are shown below');
        $sheet->mergeCells('A2:B2');
        $sheet->setCellValue('A3', ''); // Empty row for spacing

        // Style the title and instructions
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Style the header row (now row 4 after insertion)
        $sheet->getStyle('A4:B4')->getFont()->setBold(true);
        $sheet->getStyle('A4:B4')->getFill()
              ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
              ->getStartColor()->setARGB('FFD3D3D3');

        $sheet->getStyle('A4:B4')->getAlignment()
              ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Add borders to all cells with data
        $lastRow = count($this->data) + 4; // +4 for title rows and header
        if ($lastRow > 4) {
            $sheet->getStyle('A4:B'.$lastRow)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }

        // Auto-size columns
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);

        // Set a light blue background for the converted names column to highlight them
        if ($lastRow > 4) {
            $sheet->getStyle('B5:B'.$lastRow)->getFill()
                  ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                  ->getStartColor()->setARGB('FFEDF7FF');
        }

        return [
            4 => ['font' => ['bold' => true]], // Now header is at row 4
        ];
    }
}
