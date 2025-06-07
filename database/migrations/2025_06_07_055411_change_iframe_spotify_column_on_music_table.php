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
    Schema::table('music', function (Blueprint $table) {
        $table->text('iframe_spotify')->change()->nullable();
    });
}

public function down(): void
{
    Schema::table('music', function (Blueprint $table) {
        $table->string('iframe_spotify', 255)->change();
    });
}

};
