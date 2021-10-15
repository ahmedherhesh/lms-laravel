<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Resources\API\DaysResource;
use App\Models\Day;

class DaysController extends MasterAPIController
{
    public function index(){
        $days = Day::all();
        return $this->response($days, DaysResource::collection($days));
    }
}
