<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRegistrationTable extends Migration
{
    public function up()
    {
        Schema::create('userregistrations', function (Blueprint $table) {
            $table->id();
            $table->string('regNo');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('gender');
            $table->string('contactNo');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('regDate')->nullable(); // Allow null values
            $table->timestamp('updationDate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP')); // Default to current timestamp
            $table->date('passUpdateDate')->nullable(); // Allow null values
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('userregistrations');
    }
}
