<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_penulis')->insert([
            'nama_kategori' => 'Kepala Madrasah',
            'slug' => 'kepala-madrasah',
        ]);
        DB::table('kategori_penulis')->insert([
            'nama_kategori' => 'Tenaga Kependidikan',
            'slug' => 'tenaga-kependidikan',
        ]);
        DB::table('kategori_penulis')->insert([
            'nama_kategori' => 'Guru',
            'slug' => 'guru',
        ]);
        DB::table('kategori_penulis')->insert([
            'nama_kategori' => 'SIswa',
            'slug' => 'siswa',
        ]);
    }
}
