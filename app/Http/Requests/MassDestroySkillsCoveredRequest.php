<?php

namespace App\Http\Requests;

use App\Models\SkillsCovered;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySkillsCoveredRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('skills_covered_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:skills_covereds,id',
        ];
    }
}
