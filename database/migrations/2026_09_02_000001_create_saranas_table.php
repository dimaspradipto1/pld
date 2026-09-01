<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saranas', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('bi-building');   // Bootstrap Icon class
            $table->string('nama');                            // Nama sarana/fasilitas
            $table->text('deskripsi')->nullable();             // Deskripsi detail
            $table->unsignedTinyInteger('urutan')->default(0); // Urutan tampil
            $table->boolean('is_active')->default(true);       // Tampilkan di frontend
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saranas');
    }
};
