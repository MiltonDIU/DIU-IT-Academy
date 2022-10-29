<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequiredSkillRequest;
use App\Http\Requests\UpdateRequiredSkillRequest;
use App\Http\Resources\Admin\RequiredSkillResource;
use App\Models\RequiredSkill;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequiredSkillsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('required_skill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequiredSkillResource(RequiredSkill::all());
    }

    public function store(StoreRequiredSkillRequest $request)
    {
        $RequiredSkill = RequiredSkill::create($request->all());

        return (new RequiredSkillResource($RequiredSkill))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RequiredSkill $RequiredSkill)
    {
        abort_if(Gate::denies('required_skill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequiredSkillResource($RequiredSkill);
    }

    public function update(UpdateRequiredSkillRequest $request, RequiredSkill $RequiredSkill)
    {
        $RequiredSkill->update($request->all());

        return (new RequiredSkillResource($RequiredSkill))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RequiredSkill $RequiredSkill)
    {
        abort_if(Gate::denies('required_skill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $RequiredSkill->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
