<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Resources\API\StudentResource;
use App\Models\MyStudent;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends MasterAPIController
{
    /* this function has been get all students to this teacher and filtering students */
    public function index(Request $request)
    {
        $students = MyStudent::whereTeacherId($this->user->id);
        if ($request->year_id) {
            $students->whereYearId($request->year_id);
        }
        if ($request->group_id) {
            $students->whereGroupId($request->group_id);
        }
        $students = $students->get();
        return $this->response($students, StudentResource::collection($students));
    }

    /* this function has been get one student to this teacher*/
    public function show($id)
    {
        $student = MyStudent::whereStudentId($id)->whereTeacherId($this->user->id)->first();
        return $this->response($student, new StudentResource($student));
    }

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

    /* this function has been get one student to this teacher*/
    public function destroy($id)
    {
        $student = MyStudent::whereStudentId($id)->whereTeacherId($this->user->id)->first();
        if ($student) $student = $student->delete();
        return $this->response($student, 'تم حذف الطالب بنجاح');
    }
}
