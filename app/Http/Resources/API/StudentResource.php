<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'id'            => $this->student_id,
            'name'          => $this->student->name,
            'email'         => $this->student->email,
            'mobile'        => $this->student->mobile,
            'role'          => $this->student->role,
            'status'        => $this->student->status,
            'year_name'       => $this->year->name,
            'group_name'      => $this->group->name,
            'parent_mobile' => $this->parent_mobile,
        ];
    }
}
