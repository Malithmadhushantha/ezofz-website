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
        return 4; // Start from row 4 (the actual headers row in our template)
    }

    /**
     * @param array $array
     */
    public function array(array $array)
    {
        return $array;
    }
}
