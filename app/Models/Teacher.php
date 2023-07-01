<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends BaseModel
{
    use HasFactory;

    protected $fillable = array('teacher_id', 'email', 'password', 'info', 'name', 'specialization','profile_image');

    protected $casts = array('info' => 'array');


    protected $columns = array('id','image-holder' => 'profile_image','teacher_id', 'email',   'name', 'specialization');

    public function getUserIdAttribute()
    {
        return $this->teacher_id;
    }


    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teachers', 'teacher_id', 'course_id', 'id', 'id');
    }

    public function calendarEvents()
    {
        return $this->morphMany(CalendarEvent::class,'eventable');
    }


    protected $inputs = array(
        [
            'type' => 'input',
            'model' => 'name',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'teacher_id',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'specialization',
            'role' => [
                'require' => true,
            ]
        ],
//        [
//            'type' => 'select',
//            'model' => 'specializations',
//            'multiple' => true,
//            'endpoint' => [
//                'option_value' => 'id',
//                'option_name' => 'name',
//            ],
//        ],
        [
            'type' => 'input',
            'model' => 'email',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'password',
            'model' => 'password',
        ],
        [
            'type' => 'image',
            'message' => 'profile_image',
            'model' => 'profile_image',
            'class' => 'col-md-6',
            'role' => [
                'require' => true,
            ]
        ],
    );

}
