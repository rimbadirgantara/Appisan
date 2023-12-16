<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tblSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_sekolah')->insert([
            'nama_sekolah' => 'SMAN 2 Bengkalis',
            'alamat' => 'JL.PRAMUKA BENGKALIS',
            'status' => 'Negeri',
        ]);
    }
}
