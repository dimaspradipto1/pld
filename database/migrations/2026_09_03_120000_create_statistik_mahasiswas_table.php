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
        Schema::create('statistik_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->nullable()->index();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->string('jenis_disabilitas')->index();
            $table->string('fakultas')->index();
            $table->string('prodi')->index();
            $table->year('angkatan')->index();
            $table->enum('status', ['Aktif', 'Lulus', 'Cuti'])->default('Aktif')->index();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_mahasiswas');
    }
};
