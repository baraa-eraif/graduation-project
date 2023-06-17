<?php


namespace Modules\Teacher\Http\Resources;

use Modules\Base\Http\Resources\BaseResource;

class StudentResource extends BaseResource
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
            'hour_number' => get($this->additional,'course.hour_number'),
            'student_name' => get($this,'student.name'),
            'course_ident' => get($this,'student.name'),
            'specialization_name' => get($this,'specialization.name'),
            'student_id' => $this->student_id,
            'email' => $this->email,
            'name' => $this->name,

        );
    }


}
