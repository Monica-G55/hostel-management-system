<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserRegistration extends Authenticatable
{
    use Notifiable;

    protected $table = 'userregistrations';

    public $timestamps = true;

    protected $guarded = [];

    protected $fillable = [
        'regNo',
        'firstName',
        'middleName',
        'lastName',
        'gender',
        'contactNo',
        'email',
        'password',
        'regDate',
        'updationDate',
        'passUdateDate'
    ];

    protected $hidden = [
        'password',
    ];
}