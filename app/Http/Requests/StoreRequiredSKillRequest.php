<?php

namespace App\Http\Requests;

use App\Models\RequiredSKill;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequiredSKillRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('required_s_kill_create');
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
