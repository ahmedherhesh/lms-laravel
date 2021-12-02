<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'address',
        'social_media',
        'subscribe_type'
    ];
    public function teacher(){
        return $this->belongsTo(User::class);
    }
}
