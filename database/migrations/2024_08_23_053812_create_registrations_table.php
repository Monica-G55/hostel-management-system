<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('room_no');
            $table->integer('seater');
            $table->integer('fees_per_month');
            $table->integer('total_amount');
            $table->date('stay_from');
            $table->integer('food_status')->nullable();
            $table->integer('duration');
            $table->string('course')->nullable();;
            $table->string('reg_no')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('gender');
            $table->string('contact_no');
            $table->string('email_id')->unique();
            $table->string('emergency_contact_no');
            $table->string('guardian_name');
            $table->string('guardian_relation');
            $table->string('guardian_contact_no');
            $table->string('correspondence_address');
            $table->string('correspondence_city');
            $table->string('correspondence_state')->nullable();
            $table->integer('correspondence_pincode');
            $table->string('permanent_address')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_state')->nullable();
            $table->integer('permanent_pincode')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
}
