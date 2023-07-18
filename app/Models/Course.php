<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Course extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = array('course_ident', 'name', 'hour_number', 'other_details', 'semester_id');

    protected $columns = array('id', 'course_ident', 'name', 'hour_number', 'semester_name');

    protected $casts = array('other_details' => 'array');
//'first','second','third','fourth'
//'university_requirement','specialty'


    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'course_specializations', 'course_id', 'specialization_id', 'id', 'id');
    }

    public function students()
    {
        return $this->hasMany(StudentCourse::class, 'course_id');
    }

//    public function semester()
//    {
//        return $this->belongsTo(Semester::class, 'semester_id');
//    }

    public function studentRequest()
    {
        return $this->hasOne(EnrollCourseRequest::class, 'course_id')->where('student_id', auth()->id());
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teachers', 'course_id', 'teacher_id', 'id', 'id');
    }


    protected $inputs = array(
        [
            'type' => 'input',
            'model' => 'course_ident',
            'class' => 'col-md-6',
            'role' => [
                'require' => true,
            ],
        ],
        [
            'type' => 'input',
            'model' => 'name',
            'class' => 'col-md-6',
            'role' => [
                'require' => true,
            ]
        ],
        [
            'type' => 'select',
            'model' => 'semester_order',
            'class' => 'col-md-6',
            'hideSearch' => true,
            'role' => [
                'require' => true,
            ],
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
                'model' => [
                    'الاول' => 1,
                    'الثاني' => 2,
                    'الثالث' => 3,
                ]
            ],
        ],
        [
            'type' => 'select',
            'model' => 'specializations',
            'multiple' => true,
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
            ],
        ],
//        [
//            'type' => 'select',
//            'model' => 'course_type',
//            'class' => 'col-md-6',
//            'endpoint' => [
//                'option_value' => 'id',
//                'option_name' => 'name',
//                'model' => [
//                    'تخصص' => 'specialty',
//                    'متطلب جامعة' => 'university_requirement',
//                ]
//            ],
//            'function' => [
//                [
//                    'name' => 'onchange',
//                    'callable' => 'onselect_course_type',
//                ]
//            ]
//        ],
//        [
//            'type' => 'select',
//            'model' => 'study_season',
//            'class' => 'col-md-6',
//            'endpoint' => [
//                'option_value' => 'id',
//                'option_name' => 'name',
//                'model' => [
//                    'الاولى' => 1,
//                    'الثانية' => 2,
//                ]
//            ],
//        ],
//        [
//            'type' => 'select',
//            'model' => 'study_year',
//            'class' => 'col-md-6',
//            'endpoint' => [
//                'option_value' => 'id',
//                'option_name' => 'name',
//                'model' => [
//                    'الاول' => 1,
//                    'الثانية' => 2,
//                    'الثالثة' => 3,
//                    'الرابعة' => 4,
//                ]
//            ],
//        ],
        [
            'type' => 'input',
            'model' => 'hour_number',
            'role' => [
                'require' => true,
                'integer' => true,
                'lessThan' => '4',
            ]
        ],
        [
            'type' => 'select',
            'model' => 'teachers',
            'multiple' => true,
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
            ],
        ],
    );


    protected $filterInputs = array(
        [
            'type' => 'select',
            'model' => 'registration_status',
            'class' => 'col-md-6',
            'hideSearch' => true,
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'name',
                'model' => [
                    'مسجلة' => 'accepted',
                    'مرفوضة' => 'rejected',
                    'قيد الانتظار' => 'pending',
                ]
            ],
        ],
    );

    public function scopeSearch($query, Request $request)
    {
        return $query;
    }

    public function semesterOptions()
    {
        return Semester::where('status', 'approved')->pluck('id', 'title');
    }

    public function getSemesterNameAttribute()
    {
        switch ($this->semester_id){
            case 1:
               return 'الاول';
            case 2:
                return 'الثاني';
            case 3:
                return 'الثالث';
        }
    }
}
