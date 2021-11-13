<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Models\MyStudent;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends MasterAPIController
{
    public function store(Request $request)
    {
        $data = $request->all();
        $data['teacher_id'] = $this->user->id;
        $user = User::create($data);
        $data['student_id'] = $user->id;
        if ($user) {
            $student = MyStudent::create($data);
        }
        return $this->response($student, 'تم إضافة الطالب بنجاح');
    }

    public function update(Request $request, $id)
    {
        $user    = User::find($id);
        $student = MyStudent::whereStudentId($id)->whereTeacherId($this->user->id)->first();
        if (!$student || !$user) {
            return $this->response($student, '', 'عفوا هذا الطالب غير موجود');
        }
        $user    = $user->update($request->all());
        $student = $student->update($request->all());
        return $this->response($user, 'تم تعديل بيانات الطالب بنجاح');
    }
}
