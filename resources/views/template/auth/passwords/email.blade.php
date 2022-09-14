@extends('template.master')
@section('content')

    <!-- ----------------------- Sign Up start ----------------------- -->
    <section id="login" class="ptb_100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="sign_img">
                        <img src="{{ url('template/images/sign.png') }}" alt="">
                    </div>
                </div>

                <div class="offset-xxl-1 col-xxl-5 offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 offset-md-2 col-md-8 col-sm-12">
                    <div class="sign_box">
                        <h1 class="heading_section mb_36">   {{ trans('global.reset_password') }} </h1>
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('password.email') }}" class="sign_form mb_24" method="POST">
                            @csrf
                            <div class="form_wrapper mb_24">
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn_dark"> {{ trans('global.login') }} </button>
                        </form>
                        <div class="login_bottom">
                            <p class="or_text">Don't have an account?<a href="#">Signup</a></p>

                            <p class="or_text"><a href="#" class="forgot">Forgot Password</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dots">
            <img src="{{ url('template/images/dots2.png') }}" alt="">
        </div>
    </section>
    <!-- ----------------------- Sign Up end ----------------------- -->
@endsection
