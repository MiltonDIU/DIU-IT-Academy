<?php

namespace App\Http\Requests;

use App\Models\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_create');
    }

    public function rules()
    {
        return [
            'course_category_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
            'about_this_course' => [
                'required',
            ],
            'duration' => [
                'string',
                'required',
            ],
            'class_start_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'class_end_date' => [
                'string',
                'nullable',
            ],
            'course_content_types.*' => [
                'integer',
            ],
            'course_content_types' => [
                'required',
                'array',
            ],
            'skill_covereds.*' => [
                'integer',
            ],
            'skill_covereds' => [
                'array',
            ],
            'required_skills.*' => [
                'integer',
            ],
            'required_skills' => [
                'array',
            ],
            'is_active' => [
                'required',
            ],
            'picture' => [
                'required',
            ],
        ];
    }
}
