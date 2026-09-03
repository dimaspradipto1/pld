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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nim')->nullable();
            $table->string('jurusan_prodi')->nullable();
            $table->string('no_hp_wa');
            $table->string('email');
            $table->string('keahlian')->nullable();
            $table->text('alasan_bergabung')->nullable();
            $table->enum('status', ['Menunggu Review', 'Diterima', 'Ditolak'])->default('Menunggu Review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
