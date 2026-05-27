<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin'; // Ensure this matches your table name
    protected $primaryKey = 'id';


    protected $fillable = [
        'username', 'email', 'password', 'reg_date', 'updation_date',
    ];

    protected $dates = [
        'reg_date', 'updation_date',
    ];
}
