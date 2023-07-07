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
            'specialization' => $this->specialization,
            'specialization_id' => $this->specialization_id,
            'balance' => $this->balance,
            'profile_image' => image_url($this->profile_image),
            'first_name' => $this->first_name,
            'father_name' => $this->father_name,
            'grandfather_name' => $this->grandfather_name,
            'family_name' => $this->family_name,
            'date_of_birth' => $this->date_of_birth,
            'phone' => $this->phone,
            'high_school_gpa' => $this->high_school_gpa,
            'address' => $this->address,
            'gender' => $this->gender,
            'national_id' => $this->national_id,
            'nationality' => $this->nationality,
        );
    }

    public function serializeForFinancialInfo($request)
    {
        return array_merge($this->toArray($request), array(
            'balanceTransactions' => StudentBalanceTransactionResource::collection($this->balanceTransactions),

        ));
    }

}
