<?php

namespace Database\Seeders;

use App\Models\ManagementPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagementPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions=['Ketua Pengurus','Wakil Pengurus','Sekretaris Pengurus','Anggota'];
        foreach ($positions as $position) {
            ManagementPosition::create([
                'position'=> $position
            ]);
        }
    }
}
