<?php

namespace App\Http\Requests;

use App\dto\BaseApiRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            (new BaseApiRequest(
                __('base.error'),
                __('validation.error'),
                $validator->errors()))
                ->getData()
        ));
    }
}
