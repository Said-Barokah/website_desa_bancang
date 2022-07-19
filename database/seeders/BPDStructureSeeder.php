<?php

namespace Database\Seeders;

use App\Models\BPDStructure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BPDStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i <= 5 ; $i++) {
            if ($i==5) {
                BPDStructure::create([
                    'manager_id' => $i+11,
                    'position_id' => 4,
                    'from_year' => 2017,
                    'to_year' => 2022
                ]);
            }
            if($i < 5){
                BPDStructure::create([
                    'manager_id' => $i+11,
                    'position_id' => $i,
                    'from_year' => 2017,
                    'to_year' => 2022
                ]);
            }
        }
    }
}
