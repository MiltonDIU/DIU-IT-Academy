@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.courseContentType.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.course-content-types.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseContentType.fields.id') }}
                        </th>
                        <td>
                            {{ $courseContentType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseContentType.fields.title') }}
                        </th>
                        <td>
                            {{ $courseContentType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseContentType.fields.slug') }}
                        </th>
                        <td>
                            {{ $courseContentType->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseContentType.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\CourseContentType::IS_ACTIVE_SELECT[$courseContentType->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.course-content-types.index') }}">
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
                <a class="nav-link" href="#course_content_type_courses" role="tab" data-toggle="tab">
                    {{ trans('cruds.course.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="course_content_type_courses">
                @includeIf('admin.courseContentTypes.relationships.courseContentTypeCourses', ['courses' => $courseContentType->courseContentTypeCourses])
            </div>
        </div>
    </div>

@endsection
