<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Resources\API\TimetableResource;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetablesController extends MasterAPIController
{
    public function index()
    {
        $timetable = Timetable::whereTeacher_id($this->user->id)->get();
        return $this->response($timetable, TimetableResource::collection($timetable));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['teacher_id'] = $this->user->id;
        $timetable = Timetable::create($data);
        return $this->response($timetable, new TimetableResource($timetable));
    }

    public function update($id, Request $request)
    {
        $timetable = Timetable::whereId($id)->whereTeacher_id($this->user->id)->first();
        if ($timetable) $timetable->update($request->all());
        return $this->response($timetable, 'تم تحديث الجدول');
    }
    
    public function destroy($id)
    {
        $timetable = Timetable::whereId($id)->whereTeacher_id($this->user->id)->first();
        if ($timetable) $timetable->delete();
        return $this->response($timetable, 'تم حذف الجدول');
    }
}
