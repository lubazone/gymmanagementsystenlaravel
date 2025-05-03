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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('mobile')->nullable();
            $table->string('user_type'); // Student, Teacher, Staff Family, Other
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('department')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('session')->nullable();
            $table->string('designation')->nullable();
            $table->string('relationship')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('profile_photo')->nullable(); // Path to profile photo
            $table->string('id_card_photo')->nullable(); // Path to ID card photo
            $table->string('status')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
