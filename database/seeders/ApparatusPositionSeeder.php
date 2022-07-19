<?php

namespace Database\Seeders;

use App\Models\ApparatusPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApparatusPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = ['Kepala Desa','Sekretaris Desa','Kasi Pemerintahan','Kasi Pelayanan',
        'Kasi Kesejahteraan','Kaur Keuangan','Kaur Perencanaan','Kaur Umum','Kaur Dajah',
        'Kaur tenga','Kaur Laok'];
        foreach ($positions as $position ){
            ApparatusPosition::create([
                'position' => $position
            ]);
        }

    }
}
