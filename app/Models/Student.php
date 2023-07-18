<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends BaseModel
{
    use HasFactory;

    protected $fillable = array(
        'first_name', 'father_name', 'grandfather_name', 'family_name', 'date_of_birth', 'phone', 'high_school_gpa',
        'address', 'gender', 'national_id', 'nationality', 'student_id', 'email', 'password', 'info', 'specialization_id', 'balance', 'gpa',
        'profile_image', 'passed_hours', 'enrolled_hours'
    );

    protected $casts = array('info' => 'array');


    protected $columns = array('id', 'image-holder' => 'profile_image', 'student_id', 'email', 'name');


    public function getUserIdAttribute()
    {
        return $this->student_id;
    }

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->father_name . ' '. $this->family_name;
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
            'model' => 'first_name',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'father_name',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'grandfather_name',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'family_name',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'date',
            'model' => 'date_of_birth',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'input',
            'model' => 'phone',
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
            'type' => 'input',
            'model' => 'nationality',
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
            'type' => 'password',
            'model' => 'password',
        ],
        [
            'type' => 'image',
            'message' => 'profile_image',
            'model' => 'profile_image',
            'class' => 'col-md-6',
        ],
        [
            'type' => 'input',
            'model' => 'high_school_gpa',
            'role' => [
                'require' => true,
            ],

        ],
        [
            'type' => 'input',
            'model' => 'address',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'select',
            'model' => 'gender',
            'hideSearch' => true,
            'role' => [
                'require' => true,
            ],
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
                'model' => [
                    'ذكر' => 'male',
                    'انثى' => 'female',
                ]
            ],
        ],
        [
            'type' => 'input',
            'model' => 'national_id',
            'role' => [
                'require' => true,
            ]
        ],
    );
}
