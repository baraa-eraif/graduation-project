<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Student extends BaseModel
{
    use HasFactory;

    protected $fillable = array('student_id', 'email', 'password', 'info', 'name', 'specialization_id', 'balance', 'gpa', 'profile_image','passed_hours','enrolled_hours');

    protected $casts = array('info' => 'array');


    protected $columns = array('id', 'image-holder' => 'profile_image', 'student_id', 'email', 'name');


    public function getUserIdAttribute()
    {
        return $this->student_id;
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function registrationCourses()
    {
        return $this->hasMany(StudentCourse::class, 'student_id');
    }

    public function calendarEvents()
    {
        return $this->morphMany(CalendarEvent::class, 'eventable');
    }


    public function balanceTransactions()
    {
        return $this->hasMany(StudentBalanceTransaction::class, 'student_id');
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
            'model' => 'student_id',
            'span' => '12023',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'select',
            'model' => 'specialization_id',
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
            ],
            'role' => [
                'require' => true,
            ]
        ],
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

        ],
    );
}
