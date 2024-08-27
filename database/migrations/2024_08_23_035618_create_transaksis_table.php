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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kost_id');
            $table->string('foto_transaksi');
            $table->string('deskripsi');
            $table->string('email');
            $table->string('no_wa');
            $table->string('status');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kost_id')->references('id')->on('kosts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
