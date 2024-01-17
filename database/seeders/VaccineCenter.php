<?php

namespace Database\Seeders;

use App\Models\Center;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineCenter extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $centers =  [
            [
                'name' => 'Center-1',
                'location' => 'Dhanmondi,Dhaka.',
                'dailyLimit' => 10
            ],
            [
                'name' => 'Center-2',
                'location' => 'Mirpur,Dhaka.',
                'dailyLimit' => 5
            ],
            [
                'name' => 'Center-3',
                'location' => 'Uttara,Dhaka.',
                'dailyLimit' => 5
            ]
        ];
        foreach ($centers as $centerData) {
            Center::create($centerData);
        }
    }
}
