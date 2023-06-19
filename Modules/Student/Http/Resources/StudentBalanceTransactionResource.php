<?php


namespace Modules\Student\Http\Resources;

use Modules\Base\Http\Resources\BaseResource;

class StudentBalanceTransactionResource extends BaseResource
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
            'student_name' => get($this->student_data,'name'),
            'amount' => $this->amount,
            'transaction_type_text' => trans("lang.$this->transaction_type"),
        );
    }


}
