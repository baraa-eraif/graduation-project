<?php


namespace Modules\Teacher\Http\Resources;

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
            'student_name' => get($this->student_data,'first_name').get($this->student_data,'family_name'),
            'student_ident' => get($this->student_data,'student_id'),
            'course_name' => get($this->course_data,'name'),
            'course_ident' => get($this->course_data,'course_ident'),
            'midterm_grade' => (double)$this->midterm_grade,
            'final_term_grade' => (double)$this->final_term_grade,
            'activities_grades' => (double)$this->activities_grades,
            'enabled_accreditation' => is_null($this->status),
        );
    }


}
