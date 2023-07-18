<?php


namespace Modules\Admin\Http\Resources;

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
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'plan_id' => $this->plan_id,
            'hour_number' => $this->hour_number,
            'course_ident' => $this->course_ident,
            'number_of_hour' => $this->number_of_hour,
            'study_year' => $this->study_year,
//            'semester_id' => $this->semester_id,
            'study_season' => $this->study_season,
            'course_type' => $this->course_type,
            'semester_name' =>$this->semester_name
        );
    }


    public function serializeForEdit($request)
    {

        return array_merge(parent::serializeForEdit($request), array(
            'teachers' => $this->teachers ? $this->teachers->pluck('id')->toArray() : [],
            'specializations' => $this->specializations ? $this->specializations->pluck('id')->toArray() : [],
        ));
    }
}
