<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenaga_pendidiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->nullable()->constrained('layanans')->nullOnDelete();
            $table->string('nama');
            $table->string('bidang')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->string('icon')->nullable()->default('bi-person-fill');
            $table->string('link')->nullable();
            $table->string('tombol_teks')->nullable()->default('Lihat Dosen Prodi');
            $table->unsignedTinyInteger('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenaga_pendidiks');
    }
};
