<?php


namespace Modules\Admin\Http\Resources;

use Modules\Base\Http\Resources\BaseResource;

class TeacherResource extends BaseResource
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
            'teacher_id' => $this->teacher_id,
            'email' => $this->email,
            'name' => $this->name,
            'specialization' => $this->specialization,
            'profile_image' => image_url($this->profile_image),
        );
    }


}
