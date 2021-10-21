<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'year_id',
        'group_id',
        'examination_date',
        'time_start',
        'time_end'
    ];
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function day(){
        return $this->belongsTo(Day::class);
    }
}
