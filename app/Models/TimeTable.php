<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'group_id',
        'year_id',
        'day_id',
        'time'
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
