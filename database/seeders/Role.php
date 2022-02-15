<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role_desc' => 'Admin'
            ],
            [
                'role_desc' => 'User'
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
