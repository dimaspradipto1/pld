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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('judul_prestasi');
            $table->string('nama_mahasiswa');
            $table->string('nim')->nullable();
            $table->string('prodi')->nullable();
            $table->string('tingkat')->default('Nasional'); // Internasional, Nasional, Provinsi / Wilayah, Universitas
            $table->string('peringkat')->nullable(); // Juara 1, Juara 2, Medali Emas, Best Paper, dll
            $table->string('penyelenggara')->nullable();
            $table->string('tahun', 10)->nullable();
            $table->text('deskripsi')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
