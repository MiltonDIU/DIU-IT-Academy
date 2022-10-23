@extends('layouts.admin')
@section('content')
    @can('required_skill_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.required-skills.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.RequiredSkill.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.RequiredSkill.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-LessonType">
                <thead>
                <tr>
                    <th>
                        {{ trans('cruds.lessonType.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.lessonType.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.lessonType.fields.slug') }}
                    </th>
                    <th>
                        {{ trans('cruds.lessonType.fields.is_active') }}
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($requiredSkills as $key=> $requiredSkill)
                    <tr>
                        <td>{{$requiredSkill->id}}</td>
                        <td>{{$requiredSkill->title}}</td>
                        <td>{{$requiredSkill->slug}}</td>
                        <td>{{$requiredSkill->is_active}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
