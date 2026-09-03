<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tri_dharmas', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('bi-journal-check');
            $table->string('warna')->nullable()->default('var(--pld-purple)');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->unsignedTinyInteger('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tri_dharmas');
    }
};
