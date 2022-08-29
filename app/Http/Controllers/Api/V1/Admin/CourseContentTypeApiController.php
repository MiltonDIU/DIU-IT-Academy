<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseContentTypeRequest;
use App\Http\Requests\UpdateCourseContentTypeRequest;
use App\Http\Resources\Admin\CourseContentTypeResource;
use App\Models\CourseContentType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseContentTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('course_content_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseContentTypeResource(CourseContentType::all());
    }

    public function store(StoreCourseContentTypeRequest $request)
    {
        $courseContentType = CourseContentType::create($request->all());

        return (new CourseContentTypeResource($courseContentType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseContentType $courseContentType)
    {
        abort_if(Gate::denies('course_content_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseContentTypeResource($courseContentType);
    }

    public function update(UpdateCourseContentTypeRequest $request, CourseContentType $courseContentType)
    {
        $courseContentType->update($request->all());

        return (new CourseContentTypeResource($courseContentType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseContentType $courseContentType)
    {
        abort_if(Gate::denies('course_content_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseContentType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
