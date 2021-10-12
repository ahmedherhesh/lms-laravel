<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class MasterAPIController extends Controller
{
    public $user = '';

    public function __construct()
    {
        $this->user = auth('api')->user();
    }

    public function response($condition = null, $data = null, $error = 'Failed Request')
    {
        if ($condition)
            return response()->json(['status' => 200, 'data'  => $data], 200);
        return response()->json(['status' => 403, 'data'  => $error], 403);
    }
}
