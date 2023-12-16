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
        Schema::create('tbl_hasil_kalkulasi', function (Blueprint $table) {
            $table->increments('id_kalkulasi');
            $table->integer('id_user');
            $table->integer('rank_1');
            $table->integer('rank_2');
            $table->integer('rank_3');
            $table->integer('rank_4');
            $table->integer('rank_5');
            $table->integer('rank_6');
            $table->integer('rank_7');
            $table->integer('rank_8');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hasil_kalkulasi');
    }
};
