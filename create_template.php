<?php

// Create an Excel template file for the name converter
// This script should be run once to generate the template file

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

// Create a new spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Name Converter');

// Set headers
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Converted Name (Leave Empty)');

// Add instructions at the top
$sheet->insertNewRowBefore(1, 3);
$sheet->setCellValue('A1', 'EZofz.lk Name Converter Template');
$sheet->mergeCells('A1:B1');
$sheet->setCellValue('A2', 'Instructions: Enter names in the Name column below. The converted column will be filled after processing.');
$sheet->mergeCells('A2:B2');
$sheet->setCellValue('A3', ''); // Empty row for spacing

// Add example data
$sheet->setCellValue('A5', 'John Smith');
$sheet->setCellValue('A6', 'Robert Williams');
$sheet->setCellValue('A7', 'J.A. Smith');

// Style the title and instructions
$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Style the header row
$sheet->getStyle('A4:B4')->getFont()->setBold(true);
$sheet->getStyle('A4:B4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD3D3D3');
$sheet->getStyle('A4:B4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Add borders
$sheet->getStyle('A4:B7')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

// Lock the B column (Converted Name)
$sheet->getStyle('B5:B100')->getProtection()->setLocked(true);

// Add shading to the example data rows to indicate they are examples
$sheet->getStyle('A5:B7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFF2F2F2');
$sheet->setCellValue('B5', '(Example)');
$sheet->setCellValue('B6', '(Example)');
$sheet->setCellValue('B7', '(Example)');

// Auto-size columns
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);

// Set print area
$sheet->getPageSetup()->setPrintArea('A1:B100');
$sheet->getPageSetup()->setFitToWidth(1);
$sheet->getPageSetup()->setFitToHeight(0);

// Create the writer and save the file
$writer = new Xlsx($spreadsheet);
$writer->save('public/downloads/name_converter_template.xlsx');

echo "Template file created successfully!";
