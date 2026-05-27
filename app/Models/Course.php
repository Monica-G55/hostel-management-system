<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'course_code', 'course_sn', 'course_fn', 'posting_date',
    ];

    protected $casts = [
        'posting_date' => 'datetime',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'course_id', 'id');
    }
}
