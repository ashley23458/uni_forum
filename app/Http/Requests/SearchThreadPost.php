<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Laravel. (2019). Form Request Validation [Request class for validation]. (6.x).
 * Retrieved from https://laravel.com/docs/6.x/validation#form-request-validation
 */
class SearchThreadPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'search' => 'required|string|max:255',
            'filter' => 'sometimes',
        ];
    }
}
