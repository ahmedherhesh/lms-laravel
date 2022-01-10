<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $table = 'presence';
    protected $fillable = [
        'teacher_id',
        'student_id',
        'timetable_id',
        'year_id',
        'group_id',
    ];
    function student(){
        return $this->belongsTo(MyStudent::class,'student_id','student_id');
    }
}
