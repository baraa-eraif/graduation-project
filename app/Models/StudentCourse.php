<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class StudentCourse extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = array('student_id', 'course_id', 'midterm_grade', 'final_term_grade', 'activities_grades',
        'course_data', 'student_data', 'other_details','status','semester_id','teacher_id','accreditation_status');

    protected $casts = array('course_data' => 'array', 'student_data' => 'array', 'other_details' => 'array');


    protected $columns = array(
        'course_name', 'course_ident', 'midterm_grade', 'final_term_grade', 'activities_grades',
    );

    const TEACHER_ACCREDITATION = 'teacher_accreditation';
    const ADMIN_ACCREDITATION = 'admin_accreditation';

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    protected $filterInputs = array(
        [
            'type' => 'select',
            'model' => 'semester_id',
            'hideSearch' => true,
            'endpoint' => [
                'option_value' => 'id',
                'option_name' => 'title',
                'model' => [
                    'function' => 'semesterOptions'
                ]
            ],
        ],
    );

    public function semesterOptions()
    {
        return Semester::whereHas('study_plan', function ($query) {
            $query->where('specialization_id', get(auth()->user(), 'specialization_id'));
        })->pluck('id', 'title');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


    public function scopeSearch($query, Request $request)
    {
        return $query;
    }


}

