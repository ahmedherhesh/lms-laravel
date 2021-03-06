<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Resources\API\ExamResources;
use App\Http\Resources\API\QuestionResources;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamsController extends MasterAPIController
{
    public function index(){
        $exams = Exam::whereTeacher_id($this->user->id)->get();
        return $this->response($exams,$exams,'عفوا لا توجد إختبارات بعد');
    }

    public function show($id){
        $exam = Exam::whereId($id)->whereTeacher_id($this->user->id)->first();
        if($exam) $questions = Question::whereExam_id($exam->id)->get();
        $data = [
            'exam'      => $exam ? new ExamResources($exam) : 404,
            'questions' => $questions ? QuestionResources::collection($questions) : 404,
        ];
        return $this->response($exam,$data,'عفوا هذا الإختبار غير موجود');
    }

    public function store(Request $request){
        $requests = $request->all();
        $requests['teacher_id'] = $this->user->id;
        $exam = Exam::create($requests);
        return $this->response($exam,$exam);
    }

    public function update($id,Request $request){
        $exam = Exam::whereId($id)->whereTeacher_id($this->user->id)->first();
        if($exam) $exam->update($request->all());
        return $this->response($exam,'تم التحديث بنجاح');
    }

    public function destroy($id){
        $exam = Exam::whereId($id)->whereTeacher_id($this->user->id)->first();
        if($exam) $exam->delete();
        return $this->response($exam,' تم حذف الإختبار بنجاح');
    }

}
