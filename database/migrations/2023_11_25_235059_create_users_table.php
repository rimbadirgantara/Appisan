<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level', '5');
            $table->string('jenis_kelamin');
            $table->integer('id_sekolah')->nullable();
            $table->char('kelas', '2')->nullable(); 
            $table->string('profile_pict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_users');
    }
};
