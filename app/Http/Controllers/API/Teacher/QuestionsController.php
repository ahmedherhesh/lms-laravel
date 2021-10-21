<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends MasterAPIController
{
    public function store(Request $request)
    {
        $exam = Exam::whereId($request->exam_id)->whereTeacher_id($this->user->id)->first();
        if ($exam) {
            $question = Question::create($request->all());
            if ($question && $request->answers){
                Answer::create(['question_id' => $question->id, 'answers' => json_encode($request->answers)]);
            } 
            return $this->response($question, 'تم إضافة السؤال بنجاح');
        }
        return response()->json('Forbidden', 403);
    }

    public function update(Request $request)
    {
        $exam = Exam::whereId($request->exam_id)->whereTeacher_id($this->user->id)->first();
        $question = Question::find($request->question_id);
        if ($exam && $question) {
            Answer::whereQuestion_id($question->id)->update(['answers' => json_encode($request->answers)]);
            $question->update($request->all());
            return $this->response($question, 'تم تعديل السؤال بنجاح');
        }
        return response()->json('Not Found', 404);
    }

    public function destroy(Request $request)
    {
        $exam = Exam::whereId($request->exam_id)->whereTeacher_id($this->user->id)->first();
        $question = Question::find($request->question_id);
        if ($exam && $question) {
            $question = $question->delete();
            return $this->response($question, 'تم حذف السؤال بنجاح');
        }
        return response()->json('Not Found', 404);
    }
}
