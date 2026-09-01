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
        Schema::create('akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('tipe')->unique(); // kurikulum, kalender, pedoman, sistem
            $table->string('judul');
            $table->string('subjudul')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('file_dokumen')->nullable();
            $table->string('file_nama')->nullable();
            $table->string('link_url')->nullable();
            $table->string('gambar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akademiks');
    }
};
