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
            [
                'username' => 'masfudin',
                'name' => 'Masfudin',
                'email' => 'masfudin@gmail.com',
                'password' => Hash::make('1234')
            ],
            [
                'username' => 'rizaldy',
                'name' => 'Rizaldy',
                'email' => 'rizaldy@gmail.com',
                'password' => Hash::make('1234')
            ]
        ]);
    }
}
