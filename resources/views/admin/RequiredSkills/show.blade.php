@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.RequiredSkill.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.required-skills.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.RequiredSkill.fields.id') }}
                        </th>
                        <td>
                            {{ $RequiredSkill->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.RequiredSkill.fields.title') }}
                        </th>
                        <td>
                            {{ $RequiredSkill->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.RequiredSkill.fields.slug') }}
                        </th>
                        <td>
                            {{ $RequiredSkill->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.RequiredSkill.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\RequiredSkill::IS_ACTIVE_SELECT[$RequiredSkill->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.required-skills.index') }}">
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
                <a class="nav-link" href="#required_skill_courses" role="tab" data-toggle="tab">
                    {{ trans('cruds.course.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="required_skill_courses">
                @includeIf('admin.RequiredSkills.relationships.RequiredSkillCourses', ['courses' => $RequiredSkill->RequiredSkillCourses])
            </div>
        </div>
    </div>

@endsection
