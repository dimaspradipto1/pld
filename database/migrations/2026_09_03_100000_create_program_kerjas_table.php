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
        Schema::create('program_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori')->default('Bidang Pendampingan & Inklusi');
            $table->text('deskripsi');
            $table->string('sasaran')->nullable();
            $table->string('target_waktu')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->enum('status', ['Direncanakan', 'Sedang Berjalan', 'Terlaksana'])->default('Sedang Berjalan');
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
        Schema::dropIfExists('program_kerjas');
    }
};
