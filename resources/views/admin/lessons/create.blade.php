@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.lesson.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.lessons.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.lesson.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="slug">{{ trans('cruds.lesson.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.slug_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="course_id">{{ trans('cruds.lesson.fields.course') }}</label>
                    <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                        @foreach($courses as $id => $entry)
                            <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.course_helper') }}</span>
                </div>
                    <div class="form-group">
                        <label class="required" for="course_content_type_id">Content Type</label>
                        <select class="form-control select2 {{ $errors->has('sdistrict') ? 'is-invalid' : '' }}" name="course_content_type_id" id="course_content_type_id" required>
                            <option value="">{{ trans('global.pleaseSelect') }}</option>
                        </select>
                        @if($errors->has('course_content_type_id'))
                            <span class="text-danger">{{ $errors->first('course_content_type_id') }}</span>
                        @endif
                        <span class="help-block"></span>
                    </div>
                <div class="form-group">
                    <label class="required" for="lesson_type_id">{{ trans('cruds.lesson.fields.lesson_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('lesson_type') ? 'is-invalid' : '' }}" name="lesson_type_id" id="lesson_type_id" required>
                        @foreach($lesson_types as $id => $entry)
                            <option value="{{ $id }}" {{ old('lesson_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('lesson_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lesson_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.lesson_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.lesson.fields.is_active') }}</label>
                    <select class="form-control {{ $errors->has('is_active') ? 'is-invalid' : '' }}" name="is_active" id="is_active" required>
                        <option value disabled {{ old('is_active', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Lesson::IS_ACTIVE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('is_active', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('is_active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('is_active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.is_active_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection

@push('script')
    <script>
        var convertName2Alias = function () {
            var title = $(this).val().trim().toLowerCase().replace(/\s+/g, '-');
            var slug = $('#slug').val();
            if (slug == '') {
                $('#slug').val(title);
            }
        };
        $(function () {
            $('#title').on('change', convertName2Alias);
        });
    </script>

    <script type="text/javascript">
        $("#course_id").change(function(){
            $.ajax({
                url: "{{ route('course_content_type.get_by_course') }}?course_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    $('#course_content_type_id').html(data.html);
                }
            });
        });
    </script>
@endpush
