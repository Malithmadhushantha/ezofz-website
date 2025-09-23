<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;

class NameConversionImport implements ToArray, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Start from row 2 (first data row after headers)
    }

    /**
     * @param array $array
     */
    public function array(array $array)
    {
        return $array;
    }
}
