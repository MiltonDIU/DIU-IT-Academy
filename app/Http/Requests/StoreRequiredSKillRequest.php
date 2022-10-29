<?php

namespace App\Http\Requests;

use App\Models\RequiredSkill;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequiredSkillRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('required_skill_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:required_skills',
            ],
            'slug' => [
                'string',
                'required',
                'unique:required_skills',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
