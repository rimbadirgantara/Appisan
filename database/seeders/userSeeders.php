<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // cara menjalankan seeder => php artisan db:seed userSeeders
        DB::table('tbl_users')->insert([
            'username' => 'greatAdmin',
            'email' => 'greatAdmin@proton.me',
            'password'=> Hash::make('#Pinpinjur01(web)'),
            'level' => 'admin'
        ]);
    }
}
