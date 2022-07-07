<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'yanginiemailnyasaid@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => "User Role",
            'email' => 'user@role.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => "Super Admin Role",
            'email' => 'SuperAdmin@role.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('super admin');

        $user = User::create([
            'name' => "Super Admin Role",
            'email' => '190411100045@student.trunojoyo.ac.id',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('super admin');


        $user = User::create([
            'name' => "Super Admin Role",
            'email' => 'akunnasaid@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('admin');
    }
}
