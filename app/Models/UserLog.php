<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'userlogs';
    protected $primaryKey = 'id';
   

    protected $fillable = [
        'userId', 'userEmail', 'userIp', 'city', 'country', 'loginTime',
    ];

    protected $dates = [
        'loginTime',
    ];
}
