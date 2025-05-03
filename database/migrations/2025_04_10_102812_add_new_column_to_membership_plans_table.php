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
        Schema::table('membership_plans', function (Blueprint $table) {
            //add new column for badminton court fee and volleyball court fee
            $table->decimal('badminton_court_fee', 8, 2)->default(0)->after('monthly_fee')->comment('Badminton court fee');
            $table->decimal('volleyball_court_fee', 8, 2)->default(0)->after('badminton_court_fee')->comment('Volleyball court fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('membership_plans', function (Blueprint $table) {
            //
        });
    }
};
