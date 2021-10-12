<?php

namespace App\Http\Resources\API;

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
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'mobile' => $this->mobile,
                'role' => $this->role,
                'status' => $this->status,
            ],
            'token' => $this->createToken('Auth')->accessToken
        ];
    }
}
