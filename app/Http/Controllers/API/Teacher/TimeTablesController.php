<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\TimeTableResource;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimeTablesController extends MasterAPIController
{
    public function index()
    {
        $time_table = TimeTable::whereTeacher_id($this->user->id)->get();
        return $this->response($time_table, TimeTableResource::collection($time_table));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['teacher_id'] = $this->user->id;
        $time_table = TimeTable::create($data);
        return $this->response($time_table, new TimeTableResource($time_table));
    }

    public function update($id, Request $request)
    {
        $time_table = TimeTable::whereId($id)->whereTeacher_id($this->user->id)->first();
        if ($time_table) $time_table->update($request->all());
        return $this->response($time_table, 'تم تحديث الجدول');
    }
    
    public function destroy($id)
    {
        $time_table = TimeTable::whereId($id)->whereTeacher_id($this->user->id)->first();
        if ($time_table) $time_table->delete();
        return $this->response($time_table, 'تم حذف الجدول');
    }
}
