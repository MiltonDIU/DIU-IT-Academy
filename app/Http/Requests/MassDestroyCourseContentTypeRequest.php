<?php

namespace App\Http\Requests;

use App\Models\CourseContentType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseContentTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_content_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_content_types,id',
        ];
    }
}
