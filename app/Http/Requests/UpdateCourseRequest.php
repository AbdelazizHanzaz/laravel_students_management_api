<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'sometimes|required',
            'code' => 'sometimes|required|unique:courses,code,' . $this->course->id,
            'description' => 'nullable',
            'credits' => 'sometimes|required|numeric',
            'price' => 'sometimes|required|numeric'   
        ];
    }
}