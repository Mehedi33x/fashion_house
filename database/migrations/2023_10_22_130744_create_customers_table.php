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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('role');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('status', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('otp',6)->nullable();
            $table->timestamp('otp_expired_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->text('token')->nullable();
            $table->datetime('token_expired_at')->nullable();
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
