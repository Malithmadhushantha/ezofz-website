<?php

namespace Database\Seeders;

use App\Models\PoliceProvince;
use App\Models\PoliceDivision;
use App\Models\PoliceStation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PoliceDataSeeder extends Seeder
{
    public function run()
    {
        // Create provinces first
        $provinces = [
            'Western Province' => [
                'divisions' => [
                    'Colombo Central' => [
                        'stations' => ['Fort Police Station', 'Pettah Police Station', 'Kotahena Police Station']
                    ],
                    'Colombo South' => [
                        'stations' => ['Mount Lavinia Police Station', 'Dehiwala Police Station', 'Kalubowila Police Station']
                    ],
                    'Colombo North' => [
                        'stations' => ['Kelaniya Police Station', 'Peliyagoda Police Station', 'Wattala Police Station']
                    ],
                    'Gampaha' => [
                        'stations' => ['Gampaha Police Station', 'Negombo Police Station', 'Katunayake Police Station']
                    ]
                ]
            ],
            'Central Province' => [
                'divisions' => [
                    'Kandy' => [
                        'stations' => ['Kandy Police Station', 'Peradeniya Police Station', 'Gampola Police Station']
                    ],
                    'Matale' => [
                        'stations' => ['Matale Police Station', 'Dambulla Police Station', 'Ukuwela Police Station']
                    ],
                    'Nuwara Eliya' => [
                        'stations' => ['Nuwara Eliya Police Station', 'Hatton Police Station', 'Talawakele Police Station']
                    ]
                ]
            ],
            'Southern Province' => [
                'divisions' => [
                    'Galle' => [
                        'stations' => ['Galle Police Station', 'Hikkaduwa Police Station', 'Ambalangoda Police Station']
                    ],
                    'Matara' => [
                        'stations' => ['Matara Police Station', 'Weligama Police Station', 'Kamburupitiya Police Station']
                    ],
                    'Hambantota' => [
                        'stations' => ['Hambantota Police Station', 'Tissamaharama Police Station', 'Kataragama Police Station']
                    ]
                ]
            ],
            'Northern Province' => [
                'divisions' => [
                    'Jaffna' => [
                        'stations' => ['Jaffna Police Station', 'Point Pedro Police Station', 'Chavakachcheri Police Station']
                    ],
                    'Kilinochchi' => [
                        'stations' => ['Kilinochchi Police Station', 'Paranthan Police Station']
                    ],
                    'Mannar' => [
                        'stations' => ['Mannar Police Station', 'Nanattan Police Station']
                    ],
                    'Vavuniya' => [
                        'stations' => ['Vavuniya Police Station', 'Cheddikulam Police Station']
                    ],
                    'Mullaitivu' => [
                        'stations' => ['Mullaitivu Police Station', 'Oddusuddan Police Station']
                    ]
                ]
            ],
            'Eastern Province' => [
                'divisions' => [
                    'Trincomalee' => [
                        'stations' => ['Trincomalee Police Station', 'Kinniya Police Station', 'Muttur Police Station']
                    ],
                    'Batticaloa' => [
                        'stations' => ['Batticaloa Police Station', 'Kalmunai Police Station', 'Valachchenai Police Station']
                    ],
                    'Ampara' => [
                        'stations' => ['Ampara Police Station', 'Akkaraipattu Police Station', 'Sammanthurai Police Station']
                    ]
                ]
            ],
            'North Western Province' => [
                'divisions' => [
                    'Kurunegala' => [
                        'stations' => ['Kurunegala Police Station', 'Mawathagama Police Station', 'Wariyapola Police Station']
                    ],
                    'Puttalam' => [
                        'stations' => ['Puttalam Police Station', 'Chilaw Police Station', 'Wennappuwa Police Station']
                    ]
                ]
            ],
            'North Central Province' => [
                'divisions' => [
                    'Anuradhapura' => [
                        'stations' => ['Anuradhapura Police Station', 'Kekirawa Police Station', 'Medawachchiya Police Station']
                    ],
                    'Polonnaruwa' => [
                        'stations' => ['Polonnaruwa Police Station', 'Kaduruwela Police Station', 'Hingurakgoda Police Station']
                    ]
                ]
            ],
            'Uva Province' => [
                'divisions' => [
                    'Badulla' => [
                        'stations' => ['Badulla Police Station', 'Bandarawela Police Station', 'Welimada Police Station']
                    ],
                    'Monaragala' => [
                        'stations' => ['Monaragala Police Station', 'Wellawaya Police Station', 'Buttala Police Station']
                    ]
                ]
            ],
            'Sabaragamuwa Province' => [
                'divisions' => [
                    'Ratnapura' => [
                        'stations' => ['Ratnapura Police Station', 'Embilipitiya Police Station', 'Balangoda Police Station']
                    ],
                    'Kegalle' => [
                        'stations' => ['Kegalle Police Station', 'Mawanella Police Station', 'Warakakoda Police Station']
                    ]
                ]
            ]
        ];

        foreach ($provinces as $provinceName => $provinceData) {
            $province = PoliceProvince::firstOrCreate([
                'name' => $provinceName,
                'slug' => Str::slug($provinceName)
            ]);

            foreach ($provinceData['divisions'] as $divisionName => $divisionData) {
                $division = PoliceDivision::firstOrCreate([
                    'name' => $divisionName,
                    'province_id' => $province->id,
                    'slug' => Str::slug($divisionName)
                ]);

                foreach ($divisionData['stations'] as $stationName) {
                    PoliceStation::firstOrCreate([
                        'name' => $stationName,
                        'division_id' => $division->id,
                        'slug' => Str::slug($stationName),
                        'address' => $this->generateAddress($stationName),
                        'office_phone' => $this->generatePhoneNumber(),
                        'oic_mobile' => $this->generateMobileNumber(),
                        'email' => $this->generateEmail($stationName),
                    ]);
                }
            }
        }
    }

    private function generateAddress($stationName)
    {
        $baseAddress = str_replace(' Police Station', '', $stationName);
        return "Police Station, {$baseAddress}, Sri Lanka";
    }

    private function generatePhoneNumber()
    {
        // Generate realistic Sri Lankan landline numbers
        $areaCodes = ['011', '021', '023', '025', '026', '027', '031', '032', '033', '034', '035', '036', '037', '038', '041', '045', '047', '051', '052', '054', '055', '057', '063', '065', '066', '067', '081', '091', '094'];
        $areaCode = $areaCodes[array_rand($areaCodes)];
        $number = rand(1000000, 9999999);
        return $areaCode . $number;
    }

    private function generateMobileNumber()
    {
        // Generate realistic Sri Lankan mobile numbers
        $prefixes = ['070', '071', '072', '074', '075', '076', '077', '078'];
        $prefix = $prefixes[array_rand($prefixes)];
        $number = rand(1000000, 9999999);
        return $prefix . $number;
    }

    private function generateEmail($stationName)
    {
        $station = strtolower(str_replace([' Police Station', ' '], ['', '.'], $stationName));
        return "police.{$station}@police.lk";
    }
}
