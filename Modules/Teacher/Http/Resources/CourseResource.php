<?php


namespace Modules\Teacher\Http\Resources;

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
            'hour_number' => $this->hour_number,
            'course_ident' => $this->course_ident,
            'number_of_hour' => $this->number_of_hour,
            'semester_name' => optional($this->semester)->title,
        );
    }


}
