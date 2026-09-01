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
        Schema::create('topbars', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text')->default('FIKES UIS');
            $table->string('badge_icon')->nullable()->default('bi-shield-check');
            $table->string('alamat')->nullable();
            $table->string('jam_operasional')->nullable()->default('Senin - Sabtu: 08.00 - 17.00 WIB');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->json('social_media')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topbars');
    }
};
