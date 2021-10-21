<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResources extends JsonResource
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
            'id'=> $this->id,
            'year'=> $this->year->name,
            'group'=> $this->group->name,
            'time_start'=> $this->time_start,
            'time_end'=> $this->time_end,
            'examination_date'=> $this->examination_date,
        ];
    }
}
