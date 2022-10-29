<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonTypeRequest;
use App\Http\Requests\StoreLessonTypeRequest;
use App\Http\Requests\UpdateLessonTypeRequest;
use App\Models\LessonType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LessonTypesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('lesson_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LessonType::query()->select(sprintf('%s.*', (new LessonType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'lesson_type_show';
                $editGate = 'lesson_type_edit';
                $deleteGate = 'lesson_type_delete';
                $crudRoutePart = 'lesson-types';

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
                return $row->is_active ? LessonType::IS_ACTIVE_SELECT[$row->is_active] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.lessonTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lessonTypes.create');
    }

    public function store(StoreLessonTypeRequest $request)
    {
        $lessonType = LessonType::create($request->all());

        return redirect()->route('admin.lesson-types.index');
    }

    public function edit(LessonType $lessonType)
    {
        abort_if(Gate::denies('lesson_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lessonTypes.edit', compact('lessonType'));
    }

    public function update(UpdateLessonTypeRequest $request, LessonType $lessonType)
    {
        $lessonType->update($request->all());

        return redirect()->route('admin.lesson-types.index');
    }

    public function show(LessonType $lessonType)
    {
        abort_if(Gate::denies('lesson_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonType->load('lessonTypeLessons');

        return view('admin.lessonTypes.show', compact('lessonType'));
    }

    public function destroy(LessonType $lessonType)
    {
        abort_if(Gate::denies('lesson_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessonType->delete();

        return back();
    }

    public function massDestroy(MassDestroyLessonTypeRequest $request)
    {
        LessonType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
