<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \App\Exceptions\InputValidationAPIException
     */
    protected function failedValidation($validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'fails',
            'data' => $validator->errors(),
            'message' => 'Validation errors'
        ], 200));
    }
}
