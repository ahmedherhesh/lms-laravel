<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Resources\API\GroupResource;
use App\Models\Group;
class GroupsController extends MasterAPIController
{
    public function index(){
        $groups = Group::all();
        return $this->response($groups,GroupResource::collection($groups));
    }
}
