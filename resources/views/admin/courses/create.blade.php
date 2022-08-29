@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.course.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.courses.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="course_category_id">{{ trans('cruds.course.fields.course_category') }}</label>
                    <select class="form-control select2 {{ $errors->has('course_category') ? 'is-invalid' : '' }}" name="course_category_id" id="course_category_id" required>
                        @foreach($course_categories as $id => $entry)
                            <option value="{{ $id }}" {{ old('course_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_category') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.course_category_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.course.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.course.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.slug_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="introduction">{{ trans('cruds.course.fields.introduction') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('introduction') ? 'is-invalid' : '' }}" name="introduction" id="introduction">{!! old('introduction') !!}</textarea>
                    @if($errors->has('introduction'))
                        <div class="invalid-feedback">
                            {{ $errors->first('introduction') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.introduction_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="about_this_course">{{ trans('cruds.course.fields.about_this_course') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('about_this_course') ? 'is-invalid' : '' }}" name="about_this_course" id="about_this_course">{!! old('about_this_course') !!}</textarea>
                    @if($errors->has('about_this_course'))
                        <div class="invalid-feedback">
                            {{ $errors->first('about_this_course') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.about_this_course_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="duration">{{ trans('cruds.course.fields.duration') }}</label>
                    <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="text" name="duration" id="duration" value="{{ old('duration', '') }}" required>
                    @if($errors->has('duration'))
                        <div class="invalid-feedback">
                            {{ $errors->first('duration') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.duration_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="class_start_date">{{ trans('cruds.course.fields.class_start_date') }}</label>
                    <input class="form-control datetime {{ $errors->has('class_start_date') ? 'is-invalid' : '' }}" type="text" name="class_start_date" id="class_start_date" value="{{ old('class_start_date') }}" required>
                    @if($errors->has('class_start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('class_start_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.class_start_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="class_end_date">{{ trans('cruds.course.fields.class_end_date') }}</label>
                    <input class="form-control {{ $errors->has('class_end_date') ? 'is-invalid' : '' }}" type="text" name="class_end_date" id="class_end_date" value="{{ old('class_end_date', '') }}">
                    @if($errors->has('class_end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('class_end_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.class_end_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="course_content_types">{{ trans('cruds.course.fields.course_content_type') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('course_content_types') ? 'is-invalid' : '' }}" name="course_content_types[]" id="course_content_types" multiple required>
                        @foreach($course_content_types as $id => $course_content_type)
                            <option value="{{ $id }}" {{ in_array($id, old('course_content_types', [])) ? 'selected' : '' }}>{{ $course_content_type }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_content_types'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_content_types') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.course_content_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="skill_covereds">{{ trans('cruds.course.fields.skill_covered') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('skill_covereds') ? 'is-invalid' : '' }}" name="skill_covereds[]" id="skill_covereds" multiple>
                        @foreach($skill_covereds as $id => $skill_covered)
                            <option value="{{ $id }}" {{ in_array($id, old('skill_covereds', [])) ? 'selected' : '' }}>{{ $skill_covered }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('skill_covereds'))
                        <div class="invalid-feedback">
                            {{ $errors->first('skill_covereds') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.skill_covered_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="required_skills">{{ trans('cruds.course.fields.required_skill') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('required_skills') ? 'is-invalid' : '' }}" name="required_skills[]" id="required_skills" multiple>
                        @foreach($required_skills as $id => $required_skill)
                            <option value="{{ $id }}" {{ in_array($id, old('required_skills', [])) ? 'selected' : '' }}>{{ $required_skill }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('required_skills'))
                        <div class="invalid-feedback">
                            {{ $errors->first('required_skills') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.required_skill_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.course.fields.is_active') }}</label>
                    <select class="form-control {{ $errors->has('is_active') ? 'is-invalid' : '' }}" name="is_active" id="is_active" required>
                        <option value disabled {{ old('is_active', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Course::IS_ACTIVE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('is_active', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('is_active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('is_active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.is_active_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="picture">{{ trans('cruds.course.fields.picture') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('picture') ? 'is-invalid' : '' }}" id="picture-dropzone">
                    </div>
                    @if($errors->has('picture'))
                        <div class="invalid-feedback">
                            {{ $errors->first('picture') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.picture_helper') }}</span>
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

@section('scripts')
    <script>
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '{{ route('admin.courses.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() { reject(genericErrorText) });
                                        xhr.addEventListener('abort', function() { reject() });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $course->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

    <script>
        Dropzone.options.pictureDropzone = {
            url: '{{ route('admin.courses.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="picture"]').remove()
                $('form').append('<input type="hidden" name="picture" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="picture"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($course) && $course->picture)
                var file = {!! json_encode($course->picture) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="picture" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }

    </script>
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
@endpush
