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
        Schema::create('delivermen', function (Blueprint $table) {
            $table->id();
            $table->string('id_no');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('contact');
            $table->string('email');
            $table->text('address');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivermen');
    }
};
