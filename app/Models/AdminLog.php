<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $table = 'adminlog';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'adminid', 'ip', 'logintime',
    ];

    protected $dates = [
        'logintime',
    ];
}
