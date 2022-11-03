<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LessonsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Lesson::with(['course', 'lesson_type'])->select(sprintf('%s.*', (new Lesson())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'lesson_show';
                $editGate = 'lesson_edit';
                $deleteGate = 'lesson_delete';
                $crudRoutePart = 'lessons';

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
            $table->addColumn('course_title', function ($row) {
                return $row->course ? $row->course->title : '';
            });

            $table->addColumn('lesson_type_title', function ($row) {
                return $row->lesson_type ? $row->lesson_type->title : '';
            });

            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? Lesson::IS_ACTIVE_SELECT[$row->is_active] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course', 'lesson_type']);

            return $table->make(true);
        }

        return view('admin.lessons.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::orderBy('id','desc')->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lesson_types = LessonType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lessons.create', compact('courses', 'lesson_types'));
    }

    public function store(StoreLessonRequest $request)
    {
        $lesson = Lesson::create($request->all());

        return redirect()->route('admin.lessons.index');
    }

    public function edit(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lesson_types = LessonType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lesson->load('course', 'lesson_type');

        return view('admin.lessons.edit', compact('courses', 'lesson', 'lesson_types'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->all());

        return redirect()->route('admin.lessons.index');
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->load('course', 'lesson_type');

        return view('admin.lessons.show', compact('lesson'));
    }

    public function destroy(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->delete();

        return back();
    }

    public function massDestroy(MassDestroyLessonRequest $request)
    {
        Lesson::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    //return course wise content type
    public function get_by_course(Request $request)
    {

        if (!$request->course_id) {
            $html = '<option value="">'.trans('global.pleaseSelect').'</option>';
        } else {
            $html = '';
            $courses = Course::find($request->course_id);
            $html .= '<option value="">Please select Course Content Type</option>';
            foreach ($courses->course_content_types as $course_content_type) {
                $html .= '<option value="'.$course_content_type->id.'">'.$course_content_type->title.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }
}
