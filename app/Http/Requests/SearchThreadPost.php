<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
