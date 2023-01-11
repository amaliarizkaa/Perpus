<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'nurakura',
            'email' => 'nurakura9@gmail.com',
            'password' => Hash::make('nuraiman123'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ]);
    }
}
