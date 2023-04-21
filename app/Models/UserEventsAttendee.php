<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class UserEventsAttendee extends Model
{
    protected $fillable = [
        'user_id', 'event_id', 'attendee_name', 'attendee_email'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
