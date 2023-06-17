<?php


namespace Modules\Admin\Http\Resources;

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
            'student_id' => $this->student_id,
            'email' => $this->email,
            'name' => $this->name,
            'specialization' => $this->specialization
        );
    }


}
