<?php

namespace Database\Seeders;

use App\Models\PoliceProvince;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PoliceProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            'Northern Province',
            'Northwestern Province',
            'Western Province',
            'North Central Province',
            'Central Province',
            'Sabaragamuwa Province',
            'Eastern Province',
            'Uva Province',
            'Southern Province',
        ];

        foreach ($provinces as $province) {
            PoliceProvince::create([
                'name' => $province,
                'slug' => Str::slug($province),
            ]);
        }
    }
}
