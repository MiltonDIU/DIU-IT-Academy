@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.course.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                        <td>
                            {{ $course->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.course_category') }}
                        </th>
                        <td>
                            {{ $course->course_category->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.title') }}
                        </th>
                        <td>
                            {{ $course->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.slug') }}
                        </th>
                        <td>
                            {{ $course->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.introduction') }}
                        </th>
                        <td>
                            {!! $course->introduction !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.about_this_course') }}
                        </th>
                        <td>
                            {!! $course->about_this_course !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.duration') }}
                        </th>
                        <td>
                            {{ $course->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.class_start_date') }}
                        </th>
                        <td>
                            {{ $course->class_start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.class_end_date') }}
                        </th>
                        <td>
                            {{ $course->class_end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.course_content_type') }}
                        </th>
                        <td>
                            @foreach($course->course_content_types as $key => $course_content_type)
                                <span class="label label-info">{{ $course_content_type->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.skill_covered') }}
                        </th>
                        <td>
                            @foreach($course->skill_covereds as $key => $skill_covered)
                                <span class="label label-info">{{ $skill_covered->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.required_skill') }}
                        </th>
                        <td>
                            @foreach($course->required_skills as $key => $required_skill)
                                <span class="label label-info">{{ $required_skill->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\Course::IS_ACTIVE_SELECT[$course->is_active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.picture') }}
                        </th>
                        <td>
                            @if($course->picture)
                                <a href="{{ $course->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $course->picture->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#course_lessons" role="tab" data-toggle="tab">
                    {{ trans('cruds.lesson.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="course_lessons">
                @includeIf('admin.courses.relationships.courseLessons', ['lessons' => $course->courseLessons])
            </div>
        </div>
    </div>

@endsection
