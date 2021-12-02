<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\API\MasterAPIController;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\TeacherProfileResource;
use App\Models\TeacherInfo;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends MasterAPIController
{
    public function profile()
    {
        $profile = TeacherInfo::whereTeacherId($this->user->id)->first();
        return $this->response($profile, new TeacherProfileResource($profile));
    }
    public function profile_update(Request $request)
    {
        $user = User::find($this->user->id);
        $profile = TeacherInfo::whereTeacherId($this->user->id)->first();
        $data = $request->all();
        $user->update($data);
        $data['social_media'] = json_encode($request->social_media);
        if ($profile) {
            $profile = $profile->update($data);
        } else {
            $data['teacher_id'] = $this->user->id;
            $profile = TeacherInfo::create($data);
        }
        return $this->response($profile, 'تم تحديث البيانات بنجاح');
    }
}
