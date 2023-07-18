<?php


namespace Modules\Student\Http\Resources;

use Modules\Base\Http\Resources\BaseResource;

class CourseResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $studentRequest = $this->studentRequest;
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'plan_id' => $this->plan_id,
            'hour_number' => $this->hour_number,
            'course_ident' => $this->course_ident,
            'number_of_hour' => $this->number_of_hour,
            'study_year' => $this->study_year,
            'study_season' => $this->study_season,
            'course_type' => $this->course_type,
            'semester_name' => $this->semester_name,
            'status' => optional($studentRequest)->status,
            'status_text' => optional($studentRequest)->status ? trans("lang.".optional($studentRequest)->status.'_status') : null,
            'enabled_enroll' => optional($studentRequest)->status == 'rejected',
            'teachers' => $this->teachers,
            'selected_teacher' => get($this->studentRequest,'teacher_id')
        );
    }


}
