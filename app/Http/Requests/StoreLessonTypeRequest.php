<?php

namespace App\Http\Requests;

use App\Models\LessonType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLessonTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lesson_type_create');
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
