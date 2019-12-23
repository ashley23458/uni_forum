<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Laravel. (2019). Form Request Validation [Request class for validation]. (6.x).
 * Retrieved from https://laravel.com/docs/6.x/validation#form-request-validation
 */
class StoreThreadPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required|string|min:10',
            'forum_id' => 'required|integer|exists:forums,id'
        ];
    }

    /**
     * Laravel. (2019). Customizing The Error Messages [Method for creating custom error messages]. (6.x).
     * Retrieved from https://laravel.com/docs/6.x/validation#form-request-validation
     */
    public function messages()
    {
        return [
            'forum_id.integer' => 'The forum field is required.',
            'forum_id.required'  => 'The forum field is required.',
            'forum_id.exists'  => 'The selected forum does not exist.',
        ];
    }
}
