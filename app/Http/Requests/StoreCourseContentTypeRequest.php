<?php

namespace App\Http\Requests;

use App\Models\CourseContentType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseContentTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_content_type_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
