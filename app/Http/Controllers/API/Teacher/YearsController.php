<?php

namespace App\Http\Controllers\API\Teacher;
use App\Models\Year;
use App\Http\Controllers\API\MasterAPIController;
use App\Http\Resources\API\YearResource;

class YearsController extends MasterAPIController
{
    public function index(){
        $years = Year::all();
        return $this->response($years,YearResource::collection($years));
    }
}
