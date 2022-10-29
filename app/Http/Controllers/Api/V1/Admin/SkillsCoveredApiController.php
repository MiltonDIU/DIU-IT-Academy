<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillsCoveredRequest;
use App\Http\Requests\UpdateSkillsCoveredRequest;
use App\Http\Resources\Admin\SkillsCoveredResource;
use App\Models\SkillsCovered;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillsCoveredApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('skills_covered_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkillsCoveredResource(SkillsCovered::all());
    }

    public function store(StoreSkillsCoveredRequest $request)
    {
        $skillsCovered = SkillsCovered::create($request->all());

        return (new SkillsCoveredResource($skillsCovered))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SkillsCovered $skillsCovered)
    {
        abort_if(Gate::denies('skills_covered_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkillsCoveredResource($skillsCovered);
    }

    public function update(UpdateSkillsCoveredRequest $request, SkillsCovered $skillsCovered)
    {
        $skillsCovered->update($request->all());

        return (new SkillsCoveredResource($skillsCovered))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SkillsCovered $skillsCovered)
    {
        abort_if(Gate::denies('skills_covered_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skillsCovered->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
