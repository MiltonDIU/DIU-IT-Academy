<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequiredSKillRequest;
use App\Http\Requests\UpdateRequiredSKillRequest;
use App\Http\Resources\Admin\RequiredSKillResource;
use App\Models\RequiredSKill;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequiredSKillsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('required_skill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequiredSKillResource(RequiredSKill::all());
    }

    public function store(StoreRequiredSKillRequest $request)
    {
        $requiredSKill = RequiredSKill::create($request->all());

        return (new RequiredSKillResource($requiredSKill))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RequiredSKill $requiredSKill)
    {
        abort_if(Gate::denies('required_s_kill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequiredSKillResource($requiredSKill);
    }

    public function update(UpdateRequiredSKillRequest $request, RequiredSKill $requiredSKill)
    {
        $requiredSKill->update($request->all());

        return (new RequiredSKillResource($requiredSKill))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RequiredSKill $requiredSKill)
    {
        abort_if(Gate::denies('required_s_kill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requiredSKill->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
