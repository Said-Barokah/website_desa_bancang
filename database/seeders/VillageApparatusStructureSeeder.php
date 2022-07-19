<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VillageApparatusStructure;
class VillageApparatusStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 11 ; $i++) {
            VillageApparatusStructure::create([
                'apparatus_id' => $i,
                'position_id' => $i,
                'from_year' => 2017,
                'to_year' => 2022
            ]);
        }
    }
}
