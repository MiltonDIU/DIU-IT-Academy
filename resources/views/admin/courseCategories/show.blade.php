@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.courseCategory.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.course-categories.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $courseCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseCategory.fields.title') }}
                        </th>
                        <td>
                            {{ $courseCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseCategory.fields.slug') }}
                        </th>
                        <td>
                            {{ $courseCategory->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseCategory.fields.about') }}
                        </th>
                        <td>
                            {!! $courseCategory->about !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseCategory.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\CourseCategory::IS_ACTIVE_SELECT[$courseCategory->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.course-categories.index') }}">
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
                <a class="nav-link" href="#course_category_courses" role="tab" data-toggle="tab">
                    {{ trans('cruds.course.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="course_category_courses">
                @includeIf('admin.courseCategories.relationships.courseCategoryCourses', ['courses' => $courseCategory->courseCategoryCourses])
            </div>
        </div>
    </div>

@endsection
