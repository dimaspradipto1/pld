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
        Schema::create('kurikulums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id')->nullable(); // Relasi ke tabel layanans (Program Studi)
            $table->string('prodi_nama')->nullable(); // Nama prodi string fallback
            $table->string('kode_mk'); // Contoh: K3-101, KL-102
            $table->string('nama_mk'); // Nama Matakuliah
            $table->integer('semester')->default(1); // 1 sampai 8
            $table->integer('sks')->default(3); // Jumlah SKS
            $table->string('kategori')->default('Wajib'); // Wajib / Pilihan
            $table->string('file_rps')->nullable(); // Upload PDF RPS / Silabus
            $table->text('deskripsi')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('layanan_id')->references('id')->on('layanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulums');
    }
};
