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
        Schema::table('pmb_settings', function (Blueprint $table) {
            $table->json('gelombang_list')->nullable()->after('tombol_link_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pmb_settings', function (Blueprint $table) {
            $table->dropColumn('gelombang_list');
        });
    }
};
