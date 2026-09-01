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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id')->nullable(); // Relasi Program Studi
            $table->string('prodi_nama')->nullable();
            $table->string('nama_dosen');
            $table->string('jabatan_fungsional')->nullable(); // Asisten Ahli, Lektor, Lektor Kepala, Guru Besar, dll
            $table->string('nidn')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('link')->nullable(); // Link PDDIKTI / SINTA / Google Scholar (opsional)
            $table->string('foto')->nullable(); // Foto profil dosen (opsional)
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
        Schema::dropIfExists('dosens');
    }
};
