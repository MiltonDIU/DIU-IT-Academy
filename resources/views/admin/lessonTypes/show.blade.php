@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.lessonType.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.lesson-types.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lessonType.fields.id') }}
                        </th>
                        <td>
                            {{ $lessonType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lessonType.fields.title') }}
                        </th>
                        <td>
                            {{ $lessonType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lessonType.fields.slug') }}
                        </th>
                        <td>
                            {{ $lessonType->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lessonType.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\LessonType::IS_ACTIVE_SELECT[$lessonType->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.lesson-types.index') }}">
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
                <a class="nav-link" href="#lesson_type_lessons" role="tab" data-toggle="tab">
                    {{ trans('cruds.lesson.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="lesson_type_lessons">
                @includeIf('admin.lessonTypes.relationships.lessonTypeLessons', ['lessons' => $lessonType->lessonTypeLessons])
            </div>
        </div>
    </div>

@endsection
