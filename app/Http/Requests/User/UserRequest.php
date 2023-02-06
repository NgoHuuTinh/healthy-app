<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\BaseRequest;

class UserRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('m_users')->where(fn ($query) => $query->whereNull('deleted_at'))
            ],
            'password' => [
                'required',
                'confirmed',
                Password::defaults()
            ]
        ];
    }
}
