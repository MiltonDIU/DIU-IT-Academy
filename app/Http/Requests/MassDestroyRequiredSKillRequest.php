<?php

namespace App\Http\Requests;

use App\Models\RequiredSKill;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRequiredSKillRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('required_s_kill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:required_skills,id',
        ];
    }
}
