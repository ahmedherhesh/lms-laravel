<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'group_id',
        'year_id',
        'day_id',
        'time',
        'date'
    ];
    public function group(){
        return $this->hasOne(Group::class);
    }
    public function year(){
        return $this->hasOne(Year::class);
    }
    public function day(){
        return $this->hasOne(Day::class);
    }
}
