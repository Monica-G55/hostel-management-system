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
        Schema::create('userlogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('userEmail');
            $table->binary('userIp');
            $table->string('city');
            $table->string('country');
            $table->timestamp('loginTime')->useCurrent();
            $table->timestamps();
            
            // Adding indexes if necessary
            $table->index('userId');
            $table->index('userEmail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userlogs');
    }
};
