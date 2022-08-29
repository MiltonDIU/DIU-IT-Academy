@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.skillsCovered.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.skills-covereds.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.skillsCovered.fields.id') }}
                        </th>
                        <td>
                            {{ $skillsCovered->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skillsCovered.fields.title') }}
                        </th>
                        <td>
                            {{ $skillsCovered->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skillsCovered.fields.slug') }}
                        </th>
                        <td>
                            {{ $skillsCovered->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skillsCovered.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\SkillsCovered::IS_ACTIVE_SELECT[$skillsCovered->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.skills-covereds.index') }}">
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
                <a class="nav-link" href="#skill_covered_courses" role="tab" data-toggle="tab">
                    {{ trans('cruds.course.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="skill_covered_courses">
                @includeIf('admin.skillsCovereds.relationships.skillCoveredCourses', ['courses' => $skillsCovered->skillCoveredCourses])
            </div>
        </div>
    </div>

@endsection
