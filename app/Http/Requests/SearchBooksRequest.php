<?php

namespace App\Http\Requests;

use App\Exceptions\ValidationJsonException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SearchBooksRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.min' => 'The name must contain more than one character',
            'name.*' => 'Invalid book name provided',
        ];
    }

    /**
     * @param  array|mixed|null  $keys
     * @return array
     */
    public function all($keys = null): array
    {
        return array_replace_recursive(
            parent::all(),
            $this->route()->parameters()
        );
    }

    /**
     * @throws ValidationJsonException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationJsonException($validator);
    }

}
