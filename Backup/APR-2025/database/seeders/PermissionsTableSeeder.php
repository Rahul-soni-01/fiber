<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'view'],
            ['name' => 'add'],
            ['name' => 'edit'],
            ['name' => 'delete'],
            ['name' => 'manage'],
            ['name' => 'publish'],
            ['name' => 'unpublish'],
            ['name' => 'approve'],
            ['name' => 'assign'],
        ];

        // Insert permissions into the database
        DB::table('permissions')->insert($permissions);
    }
}
