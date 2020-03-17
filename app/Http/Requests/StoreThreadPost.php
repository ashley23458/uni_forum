<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    public function messages()
    {
        return [
            'forum_id.integer' => 'The forum field is required.',
            'forum_id.required'  => 'The forum field is required.',
            'forum_id.exists'  => 'The selected forum does not exist.',
        ];
    }
}
