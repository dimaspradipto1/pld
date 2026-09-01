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
        Schema::table('kurikulums', function (Blueprint $table) {
            $table->string('link_rps')->nullable()->after('file_rps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kurikulums', function (Blueprint $table) {
            $table->dropColumn('link_rps');
        });
    }
};
