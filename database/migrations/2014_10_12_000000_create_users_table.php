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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('referral_id')->unique()->nullable();
            
          $table->string('state_id');
            $table->string('role_id');
            $table->string('type_id')->nullable();

            // Optional fields
            $table->string('father_name')->nullable();
            $table->string('activation_key')->nullable();
            $table->string('referral_code')->nullable();
            
            // OTP columns
            $table->string('otp_email', 6)->nullable(); // string for OTP
            $table->boolean('email_verified')->default(false); // use boolean instead of int
            
            // User ratings & stats
            $table->decimal('average_rating', 3, 2)->default(0.00);
            $table->string('gender')->nullable();
            $table->string('profile_image')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('about_me')->nullable();
            
            // Other personal info
            $table->boolean('tos')->default(false);  // Terms of service agreed
            $table->string('language', 32)->nullable();  // string for language
            
            // Location info
            $table->decimal('latitude', 10, 7)->nullable(); // for geo-coordinates
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('country')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('contact_no', 20)->nullable();
            $table->string('address')->nullable();
            
            // Timestamps for user activity
            $table->dateTime('last_visit_time')->nullable();
            $table->dateTime('last_action_time')->nullable();

            // Image & media fields
            $table->text('take_image')->nullable();
            $table->string('created_by_id');

            // Remember me token & timestamps
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
