<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThreadPost extends FormRequest
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
            'title' => 'required|unique:threads|max:255',
            'body' => 'required|string|min:10',
            'forum_id' => 'required|integer|exists:forums,id'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
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
