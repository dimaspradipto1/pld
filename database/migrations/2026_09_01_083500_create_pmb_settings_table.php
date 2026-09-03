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
        Schema::create('pmb_settings', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->nullable()->default('PENERIMAAN MAHASISWA BARU (PMB) T.A. 2026/2027');
            $table->string('judul')->nullable()->default('Daftar Sekarang & Raih Masa Depan Cerah Bersama PLD UIS!');
            $table->text('deskripsi')->nullable();
            $table->string('tombol_text_1')->nullable()->default('Daftar PMB Sekarang');
            $table->string('tombol_link_1')->nullable()->default('/kontak');
            $table->string('tombol_text_2')->nullable()->default('Konsultasi WhatsApp PMB');
            $table->string('tombol_link_2')->nullable();
            $table->string('gelombang_1')->nullable()->default('Gelombang 1: Jan - Apr');
            $table->string('gelombang_2')->nullable()->default('Gelombang 2: Mei - Jul');
            $table->string('gelombang_3')->nullable()->default('Gelombang 3: Agu - Sep');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_settings');
    }
};
