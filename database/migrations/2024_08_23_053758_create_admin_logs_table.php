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
        // Check if the table does not exist before creating it
        if (!Schema::hasTable('adminlog')) {
            Schema::create('adminlog', function (Blueprint $table) {
                $table->id(); // This creates an auto-incrementing primary key
                $table->unsignedBigInteger('adminid');
                $table->binary('ip'); // For binary format IP addresses
                $table->timestamp('logintime');
                $table->timestamps();
            });
            
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminlog');
    }
};

