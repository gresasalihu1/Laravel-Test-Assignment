<?php

namespace App\Http\Resources\User;

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

        return 
        [
            'id' => $this->id,
            'email' => $this->email,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
