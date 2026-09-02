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
        Schema::create('layanan_terkait_settings', function (Blueprint $table) {
            $table->id();
            $table->string('judul_seksi')->default('LAYANAN TERKAIT');
            $table->text('subjudul_seksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_terkait_settings');
    }
};
