<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseContentType;
use App\Models\RequiredSKill;
use App\Models\SkillsCovered;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Course::with(['course_category', 'course_content_types', 'skill_covereds', 'required_skills'])->select(sprintf('%s.*', (new Course())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'course_show';
                $editGate = 'course_edit';
                $deleteGate = 'course_delete';
                $crudRoutePart = 'courses';

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
            $table->addColumn('course_category_title', function ($row) {
                return $row->course_category ? $row->course_category->title : '';
            });

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('duration', function ($row) {
                return $row->duration ? $row->duration : '';
            });

            $table->editColumn('class_end_date', function ($row) {
                return $row->class_end_date ? $row->class_end_date : '';
            });
            $table->editColumn('course_content_type', function ($row) {
                $labels = [];
                foreach ($row->course_content_types as $course_content_type) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $course_content_type->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('skill_covered', function ($row) {
                $labels = [];
                foreach ($row->skill_covereds as $skill_covered) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $skill_covered->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('required_skill', function ($row) {
                $labels = [];
                foreach ($row->required_skills as $required_skill) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $required_skill->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('is_active', function ($row) {
                return $row->is_active ? Course::IS_ACTIVE_SELECT[$row->is_active] : '';
            });
            $table->editColumn('picture', function ($row) {
                if ($photo = $row->picture) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course_category', 'course_content_type', 'skill_covered', 'required_skill', 'picture']);

            return $table->make(true);
        }

        return view('admin.courses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_categories = CourseCategory::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course_content_types = CourseContentType::pluck('title', 'id');

        $skill_covereds = SkillsCovered::pluck('title', 'id');

        $required_skills = RequiredSKill::pluck('title', 'id');

        return view('admin.courses.create', compact('course_categories', 'course_content_types', 'required_skills', 'skill_covereds'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());
        $course->course_content_types()->sync($request->input('course_content_types', []));
        $course->skill_covereds()->sync($request->input('skill_covereds', []));
        $course->required_skills()->sync($request->input('required_skills', []));
        if ($request->input('picture', false)) {
            $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $course->id]);
        }

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_categories = CourseCategory::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course_content_types = CourseContentType::pluck('title', 'id');

        $skill_covereds = SkillsCovered::pluck('title', 'id');

        $required_skills = RequiredSKill::pluck('title', 'id');

        $course->load('course_category', 'course_content_types', 'skill_covereds', 'required_skills');

        return view('admin.courses.edit', compact('course', 'course_categories', 'course_content_types', 'required_skills', 'skill_covereds'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());
        $course->course_content_types()->sync($request->input('course_content_types', []));
        $course->skill_covereds()->sync($request->input('skill_covereds', []));
        $course->required_skills()->sync($request->input('required_skills', []));
        if ($request->input('picture', false)) {
            if (!$course->picture || $request->input('picture') !== $course->picture->file_name) {
                if ($course->picture) {
                    $course->picture->delete();
                }
                $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
            }
        } elseif ($course->picture) {
            $course->picture->delete();
        }

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('course_category', 'course_content_types', 'skill_covereds', 'required_skills', 'courseLessons');

        return view('admin.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_create') && Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Course();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
