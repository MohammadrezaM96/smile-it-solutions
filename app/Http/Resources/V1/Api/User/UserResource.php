<?php

namespace App\Http\Resources\V1\Api\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->resource->name,
            'created_at' => $this->resource->created_at->timestamp,
        ];
    }
}
