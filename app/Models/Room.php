<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'seater', 'room_no', 'fees', 'posting_date',
    ];

    protected $dates = [
        'posting_date',
    ];
}
