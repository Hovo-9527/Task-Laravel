<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Admin",
                'email' => "admin123@gmail.com",
                'password' => Hash::make("Dev-123"),
                'role_id' => "1"
            ],
            [
                'name' => "Test",
                'email' => "worker123@gmail.com",
                'password' => Hash::make("Dev-321"),
                'role_id' => "2"
            ]
        ]);
    }
}
