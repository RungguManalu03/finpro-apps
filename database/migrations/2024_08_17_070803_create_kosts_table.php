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
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kost');
            $table->string('harga');
            $table->string('lokasi');
            $table->string('pemilik');
            $table->string('kontak_wa');
            $table->string('kontak_email');
            $table->string('services');
            $table->text('deskripsi');
            $table->string('foto_kost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosts');
    }
};
