<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRegistration extends Model
{
    protected $table = 'userregistrations';
    // Table name
    public $timestamps = true; // Enable default timestamps (created_at and updated_at)

    protected $fillable = ['regNo', 'firstName', 'middleName', 'lastName', 'gender', 'contactNo', 'email', 'password', 'regDate', 'updationDate', 'passUdateDate'];
}
