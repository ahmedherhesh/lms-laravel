<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Resources\API\PresenceResource;
use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends MasterAPIController
{
    function presentStudents(Request $request)
    {
        $students = Presence::whereTeacherId($this->user->id);
        if ($request->timetable_date) {
            $students->whereTimetableDate($request->timetable_date);
        }else{
            $students->whereTimetableDate(date('Y-m-d'));
        }
        if ($request->year_id) {
            $students->whereYearId($request->year_id);
        }
        if ($request->group_id) {
            $students->whereGroupId($request->group_id);
        }
        $students = $students->paginate(30);
        if ($students)
            return PresenceResource::collection($students);
    }

    function absentStudents()
    {
        
    }
}
