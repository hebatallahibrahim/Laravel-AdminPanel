<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'id' => 1,
            'role' => 1, //for admin
            'password' => Hash::make('password'),
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'role' => 2,//for user
            'password' => Hash::make('password'),
            'name' => 'user',
            'email' => 'user@user.com',
        ]);
    }
}
