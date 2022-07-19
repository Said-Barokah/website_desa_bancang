<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ApparatusPositionSeeder::class);
        $this->call(ManagementPositionSeeder::class);
        $this->call(VillagerSeeder::class);
        $this->call(VillageApparatusStructureSeeder::class);
        $this->call(BPDStructureSeeder::class);
        // $this->call(PostSeeder::class):
        // Post::factory(150)->create();
        // Category::factory(15)->create();
    }
}
