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
            'thread-trixFields.*' => 'required|min:10',
            'forum_id' => 'required|integer|exists:forums,id'
        ];
    }

    public function messages()
    {
        return [
            'forum_id.integer' => __('messages.forum_required'),
            'forum_id.required'  => __('messages.forum_required'),
            'forum_id.exists'  =>  __('messages.forum_exists'),
        ];
    }
}
