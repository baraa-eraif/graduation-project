<?php


namespace Modules\Student\Http\Resources;

use Modules\Base\Http\Resources\BaseResource;

class StudentCourseResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'student_name' => get($this->student,'name'),
            'course_name' => get($this->course,'name'),
            'course_ident' => get($this->course,'course_ident'),
            'midterm_grade' => $this->midterm_grade,
            'final_term_grade' => $this->final_term_grade,
            'activities_grades' => $this->activities_grades,
        );
    }


}
