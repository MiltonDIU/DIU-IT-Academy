<?php

namespace App\Http\Requests;

use App\Models\SkillsCovered;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSkillsCoveredRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('skills_covered_create');
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
