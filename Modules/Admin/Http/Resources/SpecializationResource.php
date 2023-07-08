<?php


namespace Modules\Admin\Http\Resources;

use Modules\Base\Http\Resources\BaseResource;

class SpecializationResource extends BaseResource
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
            'number_of_hour' => $this->number_of_hour,
            'hour_price' => $this->hour_price,
        );
    }


    public function serializeForShow($request)
    {

        return array_merge($this->toArray($request), array(
            'specialization_courses' => $this->courses,
            'specialization_years' => array('first', 'second', 'third', 'fourth'),
            'specialization_season' => array('first', 'second'),
        ));
    }
}
