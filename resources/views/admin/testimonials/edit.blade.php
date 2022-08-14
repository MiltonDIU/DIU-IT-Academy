@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.testimonial.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.testimonials.update", [$testimonial->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.testimonial.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $testimonial->name) }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="designation">{{ trans('cruds.testimonial.fields.designation') }}</label>
                    <input class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}" type="text" name="designation" id="designation" value="{{ old('designation', $testimonial->designation) }}" required>
                    @if($errors->has('designation'))
                        <span class="text-danger">{{ $errors->first('designation') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.designation_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="organization_name">{{ trans('cruds.testimonial.fields.organization_name') }}</label>
                    <input class="form-control {{ $errors->has('organization_name') ? 'is-invalid' : '' }}" type="text" name="organization_name" id="organization_name" value="{{ old('organization_name', $testimonial->organization_name) }}">
                    @if($errors->has('organization_name'))
                        <span class="text-danger">{{ $errors->first('organization_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.organization_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="avatar">{{ trans('cruds.testimonial.fields.avatar') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('avatar') ? 'is-invalid' : '' }}" id="avatar-dropzone">
                    </div>
                    @if($errors->has('avatar'))
                        <span class="text-danger">{{ $errors->first('avatar') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.avatar_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="about">{{ trans('cruds.testimonial.fields.about') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('about') ? 'is-invalid' : '' }}" name="about" id="about">{!! old('about', $testimonial->about) !!}</textarea>
                    @if($errors->has('about'))
                        <span class="text-danger">{{ $errors->first('about') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.testimonial.fields.about_helper') }}</span>
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
        Dropzone.options.avatarDropzone = {
            url: '{{ route('admin.testimonials.storeMedia') }}',
            maxFilesize: 1, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1,
                width: 1024,
                height: 1024
            },
            success: function (file, response) {
                $('form').find('input[name="avatar"]').remove()
                $('form').append('<input type="hidden" name="avatar" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="avatar"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($testimonial) && $testimonial->avatar)
                var file = {!! json_encode($testimonial->avatar) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="avatar" value="' + file.file_name + '">')
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
                                        xhr.open('POST', '{{ route('admin.testimonials.storeCKEditorImages') }}', true);
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
                                        data.append('crud_id', '{{ $testimonial->id ?? 0 }}');
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

@endsection
