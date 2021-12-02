<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'student_id',
        'year_id',
        'group_id',
        'parent_mobile',
    ];

    public function student(){
        return $this->belongsTo(User::class);
    }
    public function year(){
        return $this->belongsTo(Year::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
