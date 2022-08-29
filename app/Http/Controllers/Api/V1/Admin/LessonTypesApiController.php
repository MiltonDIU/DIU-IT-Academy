<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonTypeRequest;
use App\Http\Requests\UpdateLessonTypeRequest;
use App\Http\Resources\Admin\LessonTypeResource;
use App\Models\LessonType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonTypesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonTypeResource(LessonType::all());
    }

    public function store(StoreLessonTypeRequest $request)
    {
        $lessonType = LessonType::create($request->all());

        return (new LessonTypeResource($lessonType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LessonType $lessonType)
    {
        abort_if(Gate::denies('lesson_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonTypeResource($lessonType);
    }

    public function update(UpdateLessonTypeRequest $request, LessonType $lessonType)
    {
        $lessonType->update($request->all());

        return (new LessonTypeResource($lessonType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LessonType $lessonType)
    {
        abort_if(Gate::denies('lesson_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
