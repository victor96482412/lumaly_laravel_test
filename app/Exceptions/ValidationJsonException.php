<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

class ValidationJsonException extends Exception
{
    protected $validator;

    protected $code = 422;

    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        parent::__construct('Validation Error');
    }

    public function render(): Response
    {
        return response(['message' => $this->validator->getMessageBag()->all()], $this->code);
    }
}
