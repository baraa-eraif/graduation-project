<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollCourseRequest extends BaseModel
{
    use HasFactory;

    protected $fillable = array('status', 'course_data', 'student_data', 'course_id', 'student_id','teacher_id');

    protected $columns = array('id', 'course_name', 'student_name');

    protected $casts = array('course_data' => 'array', 'student_data' => 'array',);

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

}
