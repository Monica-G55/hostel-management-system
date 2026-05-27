<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations'; // Ensure this matches your table name
    protected $primaryKey = 'id'; // Ensure this is correct
    public $timestamps = false; // Set to true if you use timestamps

    protected $fillable = [
        'room_no', 'stay_from', 'seater', 'duration', 'food_status',
        'fees_per_month', 'total_amount', 'reg_no', 'first_name',
        'middle_name', 'last_name', 'gender', 'contact_no', 'email_id',
        'emergency_contact_no', 'guardian_name', 'guardian_relation',
        'guardian_contact_no', 'correspondence_address', 'correspondence_city',
        'correspondence_state', 'correspondence_pincode', 'permanent_address',
        'permanent_city', 'permanent_state', 'permanent_pincode', 'posting_date'
    ];

    protected $casts = [
        'stay_from' => 'datetime',
        'posting_date' => 'datetime',
    ];

    // Define any relationships, if applicable
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
