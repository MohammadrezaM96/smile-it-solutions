<?php

namespace App\Http\Resources\V1\Api\BankAccount;

use App\Http\Resources\V1\Api\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            '_type' => class_basename($this->resource),
            'id' => $this->resource->id,
            'user' => $this->when(!$request->routeIs('api.public.bankAccount.balance') , new UserResource($this->resource->user)),
            'balance' => $this->resource->amount,
            'created_at' => $this->resource->created_at->timestamp,
        ];
    }
}
