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
        Schema::table('shedules', function (Blueprint $table) {
            Schema::table('shedules', function (Blueprint $table) {
                $table->string('usertype')->after('time')->default('man');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shedules', function (Blueprint $table) {
            //
        });
    }
};
