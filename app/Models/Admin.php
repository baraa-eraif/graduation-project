<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends BaseModel
{
    use HasFactory;

    protected $fillable = array('admin_id', 'email', 'password', 'info', 'name');

    protected $casts = array('info' => 'array');


    protected $appends = ['profile_image'];

    public function calendarEvents()
    {
        return $this->morphMany(CalendarEvent::class, 'eventable');
    }

    public function getProfileImageAttribute()
    {
        return 'assets/media/avatars/blank.png';
    }
}
