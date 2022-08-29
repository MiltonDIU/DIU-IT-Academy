<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseContentTypeRequest;
use App\Http\Requests\StoreCourseContentTypeRequest;
use App\Http\Requests\UpdateCourseContentTypeRequest;
use App\Models\CourseContentType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseContentTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('course_content_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CourseContentType::query()->select(sprintf('%s.*', (new CourseContentType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'course_content_type_show';
                $editGate = 'course_content_type_edit';
                $deleteGate = 'course_content_type_delete';
                $crudRoutePart = 'course-content-types';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? CourseContentType::IS_ACTIVE_SELECT[$row->is_active] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.courseContentTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_content_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseContentTypes.create');
    }

    public function store(StoreCourseContentTypeRequest $request)
    {
        $courseContentType = CourseContentType::create($request->all());

        return redirect()->route('admin.course-content-types.index');
    }

    public function edit(CourseContentType $courseContentType)
    {
        abort_if(Gate::denies('course_content_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseContentTypes.edit', compact('courseContentType'));
    }

    public function update(UpdateCourseContentTypeRequest $request, CourseContentType $courseContentType)
    {
        $courseContentType->update($request->all());

        return redirect()->route('admin.course-content-types.index');
    }

    public function show(CourseContentType $courseContentType)
    {
        abort_if(Gate::denies('course_content_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseContentType->load('courseContentTypeCourses');

        return view('admin.courseContentTypes.show', compact('courseContentType'));
    }

    public function destroy(CourseContentType $courseContentType)
    {
        abort_if(Gate::denies('course_content_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseContentType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseContentTypeRequest $request)
    {
        CourseContentType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
