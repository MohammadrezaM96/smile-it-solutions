<?php

namespace App\Http\Resources\V1\Api\Transfer;

use App\Http\Resources\V1\Api\BankAccount\BankAccountResource;
use App\Models\BankAccount;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferResource extends JsonResource
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
            'origin' => new BankAccountResource($this->resource->originAccount),
            'destination' => new BankAccountResource($this->resource->DestinationAccount),
            'amount' => $this->resource->amount,
            'status' => $this->resource->status,
            'created_at' => $this->resource->created_at->timestamp,
        ];
    }
}
