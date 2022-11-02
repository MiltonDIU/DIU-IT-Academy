@extends('template.master')
@section('content')
    <!-- ----------------------- page banner start ----------------------- -->
    <section id="page_banner">
        <div class="container">
            <div class="page_banner_text">
                <h1 class="heading_two">Welcome {{ auth()->user()->name }}</h1>
            </div>
        </div>
    </section>
    <!-- ----------------------- profile start ----------------------- -->
    <section id="profile_main" class="mb_100">
        <div class="container">
            <ul class="nav nav-pills nav_top mb_48" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ route('student.my-profile') }}">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ route('student.my-course') }}">Course</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ route('student.my-certificate') }}">Certificate</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ route('student.my-community') }}">Community</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row justify_center">
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="profile_left_box">
                                <div class="profile_img_display">
                                    <div class="img_box">
                                        @if(auth()->user()->avatar)
                                                <img src="{{ auth()->user()->avatar->getUrl() }}" alt="{{ $user->name }}">
                                        @endif



                                    </div>
                                    <h2 class="user_name mb_24">{{ auth()->user()->name }}</h2>
                                </div>

                                <div class="profile_options">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-edit-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit-profile" type="button" role="tab" aria-controls="v-pills-edit-profile" aria-selected="true">Edit Profile</button>

                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile-picture" type="button" role="tab" aria-controls="v-pills-profile-picture" aria-selected="false">Profile Picture</button>

                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>

                                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about" type="button" role="tab" aria-controls="v-pills-about" aria-selected="false">About</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="offset-xxl-1 col-xxl-8 offset-xl-1 col-xl-8 col-lg-8 col-md-8 col-sm-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                @if(session('message'))
                                    <div class="row mb-2">
                                        <div class="col-lg-12">
                                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                                        </div>
                                    </div>
                                @endif
                                <div class="tab-pane fade @if((session('page')=='my-profile') || !session('page')) show active @endif " id="v-pills-edit-profile" role="tabpanel" aria-labelledby="v-pills-edit-profile-tab">
                                    <h6 class="heading_two mb_36">Edit Profile</h6>

                                        <form class="profile_form mb_24" method="POST" action="{{ route("student.profile-update", [auth()->id()]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form_wrapper mb_24">
                                                <label for="name" class="required">Name</label>
                                                <input type="text" name="name" id="name" placeholder="Name" value="{{ auth()->user()->name }}" required>
                                            </div>

                                            <div class="form_wrapper mb_24">
                                                <label for="email" class="required">Email</label>
                                                <input type="email" name="email" id="email" disabled placeholder="Email" value="{{ auth()->user()->email }}" required>
                                            </div>

                                            <div class="form_wrapper mb_24">
                                                <label for="mobile" class="required">Mobile</label>
                                                <input type="number" name="mobile" id="mobile" placeholder="Mobile" value="{{ auth()->user()->mobile }}" required>
                                            </div>

                                            <div class="form_wrapper mb_24">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" id="address" value="{{ auth()->user()->address }}" placeholder="Address">
                                            </div>

                                            <div class="form_wrapper mb_24">
                                                <label for="profession">Profession</label>
                                                <input type="text" name="profession" id="profession" value="{{ auth()->user()->profession }}" placeholder="Profession">
                                            </div>

                                            <div class="form_wrapper mb_24">
                                                <label for="date-of-birth">Date of Birth</label>
                                                <input type="date" name="date_of_birth" value="{{ auth()->user()->date_of_birth }}" id="date_of_birth" placeholder="">



                                            </div>

                                            <div class="form_wrapper mb_24">
                                                <label for="nid">National ID</label>
                                                <input type="number" name="nid" id="nid" value="{{ auth()->user()->nid }}" placeholder="">
                                            </div>

                                            <div class="radio_wrapper">
                                                <p>Gender</p>
                                                <div class="radio_wrapper_inner">
                                                    <input type="radio" id="male" name="gender" value="male" {!! (auth()->user()->gender==='male')?'checked':'' !!}>
                                                    <label for="male">Male</label>

                                                    <input type="radio" id="female" name="gender" value="female" {!! (auth()->user()->gender==='female')?'checked':''  !!}>
                                                    <label for="female">Female</label>

                                                    <input type="radio" id="others" name="gender" value="others" {!! (auth()->user()->gender==='others')?'checked':''  !!}>
                                                    <label for="others">Others</label>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn_dark">update</button>
                                        </form>

                                </div>

                                <div class="tab-pane fade @if(session('page')=='profile-picture') show active @endif" id="v-pills-profile-picture" role="tabpanel" aria-labelledby="v-pills-profile-picture-tab">
                                    <h6 class="heading_two mb_36">Profile Picture</h6>

                                        <form class="profile_form mb_24" method="POST" action="{{ route("student.profile-picture-update", [auth()->id()]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf


                                        <div class="form_wrapper mb_24">
                                        <div class="needsclick dropzone {{ $errors->has('avatar') ? 'is-invalid' : '' }}" id="avatar-dropzone">
                                        </div>
                                        @if($errors->has('avatar'))
                                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.user.fields.avatar_helper') }}</span>

                                        </div>

                                        <button type="submit" class="btn btn_dark">Upload</button>
                                    </form>
                                </div>

                                <div class="tab-pane fade @if(session('page')=='password') show active @endif" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <h6 class="heading_two mb_36">Settings</h6>
                                    <form class="profile_form mb_24" method="POST" action="{{ route("student.password.update") }}">
                                        @csrf
                                        <div class="form_wrapper mb_24">
                                            <label for="new-password">New Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form_wrapper mb_24">
                                            <label for="confirm-password">Confirm Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Confirm Password">
                                        </div>

                                        <button type="submit" class="btn btn_dark">Update</button>
                                    </form>
                                </div>


                                <div class="tab-pane fade  @if(session('page')=='about') show active @endif" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">
                                    <h6 class="heading_two mb_36">About</h6>
                                    <form class="profile_form mb_24" method="POST" action="{{ route("student.about-update", [auth()->id()]) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form_wrapper mb_24">
                                            <textarea class="@error('about') is-invalid @enderror" name="about" id="about" cols="30" rows="5" placeholder="Type here ... "> {!! auth()->user()->about !!}</textarea>
                                        </div>
                                        @error('about')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                        <button type="submit" class="btn btn_dark">Update</button>
                                    </form>
                                </div>







{{--                                @include('template.student.profile-picture-form')--}}
{{--                                @include('template.student.password-form')--}}
{{--                                @include('template.student.about-form')--}}





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ----------------------- profile start ----------------------- -->

@endsection
@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endpush
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.sliderImageDropzone = {
            url: '{{ route('admin.sliders.storeMedia') }}',
            maxFilesize: 3, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 3,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="slider_image"]').remove()
                $('form').append('<input type="hidden" name="slider_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="slider_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($slider) && $slider->slider_image)
                var file = {!! json_encode($slider->slider_image) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="slider_image" value="' + file.file_name + '">')
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
        Dropzone.options.avatarDropzone = {
            url: '{{ route('student.profile.storeMedia') }}',
            maxFilesize: 1, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1,
                width: 4096,
                height: 4096
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
                @if(isset($user) && $user->avatar)
                var file = {!! json_encode($user->avatar) !!}
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

@endpush
