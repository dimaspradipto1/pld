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
        Schema::create('organisasi_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('singkatan')->nullable();
            $table->string('slug')->unique();
            $table->string('kategori')->default('Himpunan Mahasiswa (HIMA)');
            $table->longText('deskripsi')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('nama_ketua')->nullable();
            $table->string('nama_wakil')->nullable();
            $table->string('pembina')->nullable();
            $table->string('periode')->nullable()->default('2025/2026');
            $table->string('logo')->nullable();
            $table->string('foto_kegiatan')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->string('link_pendaftaran')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasi_mahasiswas');
    }
};
