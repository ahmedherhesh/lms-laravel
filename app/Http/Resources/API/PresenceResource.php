<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class PresenceResource extends JsonResource
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
            "timetable_id"    => $this->id,
            "teacher_name"    => auth('api')->user()->name,
            "student_name"    => $this->student->student->name ?? null,
            "year_name"       => $this->student->year->name ?? null,
            "group_name"      => $this->student->group->name ?? null,
            "present_date"    => $this->created_at->format('Y-m-d') ?? null
        ];
    }
}
