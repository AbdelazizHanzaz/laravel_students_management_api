<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required|unique:courses', 
            'description' => 'nullable',
            'credits' => 'required|numeric',
            'price' => 'required|numeric'
        ];
    }
}