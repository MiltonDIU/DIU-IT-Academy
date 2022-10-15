@extends('template.master')
@section('content')


    <!-- ----------------------- Sign Up start ----------------------- -->
    <section id="sign_up" class="ptb_100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="sign_img">
                        <img src="{{ url('template/images/sign.png') }}" alt="">
                    </div>
                </div>

                <div class="offset-xxl-1 col-xxl-5 offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 offset-md-2 col-md-8 col-sm-12">
                    <div class="sign_box">
                        <h1 class="heading_section mb_36">Join Us</h1>
                        @if(session('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                            <form class="sign_form mb_24" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                            <div class="form_wrapper mb_24">
                                <input type="text" name="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form_wrapper mb_24">
                                <input type="email" name="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form_wrapper mb_24">
                                <input type="number" name="mobile" class="{{ $errors->has('mobile') ? ' is-invalid' : '' }}" required placeholder="Mobile" value="{{ old('mobile', null) }}">
                                @if($errors->has('mobile'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mobile') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form_wrapper mb_24">
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                                <div class="form_wrapper mb_24">
                                    <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                                </div>
                            <button type="submit" class="btn btn_dark">Sign Up</button>
                        </form>


                        <p class="or_text">Already have an account?<a href="{{ route('login') }}">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="dots">
            <img src="images/dots2.png" alt="">
        </div>
    </section>
    <!-- ----------------------- Sign Up end ----------------------- -->

@endsection
