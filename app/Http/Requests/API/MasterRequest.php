<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MasterRequest extends FormRequest
{
   public function failedValidation(Validator $validator){
       throw new HttpResponseException(
           response()->json([
            'status' => 422,
            'messages' => $validator->errors()
           ])
        );
   }
}
