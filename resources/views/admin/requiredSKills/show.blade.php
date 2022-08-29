@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.requiredSKill.title') }}
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
                            {{ trans('cruds.requiredSKill.fields.id') }}
                        </th>
                        <td>
                            {{ $requiredSKill->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requiredSKill.fields.title') }}
                        </th>
                        <td>
                            {{ $requiredSKill->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requiredSKill.fields.slug') }}
                        </th>
                        <td>
                            {{ $requiredSKill->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requiredSKill.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\RequiredSKill::IS_ACTIVE_SELECT[$requiredSKill->is_active] ?? '' }}
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
                @includeIf('admin.requiredSKills.relationships.requiredSkillCourses', ['courses' => $requiredSKill->requiredSkillCourses])
            </div>
        </div>
    </div>

@endsection
