<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationJsonException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|string',
            'password' => 'required|string',
        ];
    }

    /**
     * @throws ValidationJsonException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationJsonException($validator);
    }
}
