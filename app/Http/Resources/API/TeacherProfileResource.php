<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherProfileResource extends JsonResource
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
            'id'      => $this->teacher_id,
            'name'    => $this->teacher->name,
            'email'   => $this->teacher->email,
            'mobile'  => $this->teacher->mobile,
            'image'   => $this->teacher->image,
            'role'    => $this->teacher->role,
            'status'  => $this->teacher->status,
            'address' => $this->address,
            'social_media'   => json_decode($this->social_media),
            'created_at'     => $this->created_at->format('Y-m-d'),
            'subscribe_type' => $this->subscribe_type,
            'next_payment_time' => $this->next_payment_time,
        ];
    }
}
