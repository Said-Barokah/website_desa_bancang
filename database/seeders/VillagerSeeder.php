<?php

namespace Database\Seeders;

use App\Models\Villager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villagers = [
            'Maisyaroh','Moch. Sued','Muhammad Yasin','Siti Muslichah','Citra Indah Sari',
            'Abdul, Hamid','Kamilia','Choirul Anam','Mudawwamah','Rudi Salam','Erna'
        ];
        foreach ($villagers as $villager) {
            Villager::create([
                'nik' => uniqid(),
                'name' => $villager
            ]);
        }

        $villagers = [
            'Nais Yam Yunis','Ima Hoiriya','Nur Laili',"Imam Syafi'i",'Lisniawati'
        ];

        foreach ($villagers as $villager) {
            Villager::create([
                'nik' => uniqid(),
                'name' => $villager
            ]);
        }

    }
}
