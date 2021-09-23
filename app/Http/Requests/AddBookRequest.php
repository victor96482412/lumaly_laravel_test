<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationJsonException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'genre' => 'required|string',
            'name' => 'required|string',
            'author' => 'required|string',
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
