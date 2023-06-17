<?php


namespace Modules\Admin\Http\Resources;

use Modules\Base\Http\Resources\BaseResource;

class SemesterResource extends BaseResource
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
            'title' => $this->title,
            'ordered' => $this->ordered,
            'year' => $this->year,
            'study_plan_id' => $this->study_plan_id,
            'number_of_hour' => $this->number_of_hour,
            'start_date' => formatDates($this->start_date,'Y-m-d'),
            'end_date' => formatDates($this->end_date,'Y-m-d')
        );
    }



}
