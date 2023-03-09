<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Monika',
            'role' => '3',
            'email' => 'monika@gmail.com',
            'password' => Hash::make('monika123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Simona',
            'role' => '1',
            'email' => 'simona@gmail.com',
            'password' => Hash::make('simona123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Greta',
            'role' => '1',
            'email' => 'greta@gmail.com',
            'password' => Hash::make('greta123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Zilvinas',
            'role' => '1',
            'email' => 'zilvinas@gmail.com',
            'password' => Hash::make('zilvinas123'),
        ]);
    }
}
