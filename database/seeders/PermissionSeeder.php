<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id' => 1,
            'name' => 'create',
            'slug' => 'create',
        ]);
        DB::table('permissions')->insert([
            'id' => 2,
            'name' => 'edit',
            'slug' => 'edit',
        ]);
        DB::table('permissions')->insert([
            'id' => 3,
            'name' => 'update',
            'slug' => 'update',
        ]);
        DB::table('permissions')->insert([
            'id' => 4,
            'name' => 'delete',
            'slug' => 'delete',
        ]);
    }
}
