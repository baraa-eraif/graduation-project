<?php

namespace Modules\Base\Http\Resources;

use App\Models\Seller;
use App\Models\SellerOrder;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function serializeForEdit($resource)
    {
        return array_merge($this->toArray(request()),[
            'actions' => route(current_route() . '.update', [$this->id]),
            'inputs' => get_inputs($this),
            'form_method' => 'post',
        ], $this->additionalData($resource));
    }

    public function serializeForAll()
    {
        return array_merge([
            //
        ], $this->additionalData());
    }

    public function serializeForShow($request)
    {
        return array_merge([
            //
        ], $this->additionalData());
    }

    public function serializeForCreate($resource = [])
    {
        return array_merge([
            'inputs' => get_inputs($this),
            'actions' => route(current_route() . '.store'),
        ], $this->additionalData($resource));
    }

    public function additionalData($resource = []): array
    {
        return [
            'model' => $this->resource,
        ];
    }

    public function serializeForSheet()
    {
        return array_merge([
            //
        ], $this->additionalData());
    }

}
