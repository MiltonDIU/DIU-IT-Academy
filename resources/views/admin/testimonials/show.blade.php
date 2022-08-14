@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.testimonial.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.testimonials.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.id') }}
                        </th>
                        <td>
                            {{ $testimonial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.name') }}
                        </th>
                        <td>
                            {{ $testimonial->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.designation') }}
                        </th>
                        <td>
                            {{ $testimonial->designation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.organization_name') }}
                        </th>
                        <td>
                            {{ $testimonial->organization_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.avatar') }}
                        </th>
                        <td>
                            @if($testimonial->avatar)
                                <a href="{{ $testimonial->avatar->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $testimonial->avatar->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimonial.fields.about') }}
                        </th>
                        <td>
                            {!! $testimonial->about !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.testimonials.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
