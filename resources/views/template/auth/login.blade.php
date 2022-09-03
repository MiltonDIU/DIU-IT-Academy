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
                        <h1 class="heading_section mb_36">Welcome Back!</h1>

                        <form action="" class="sign_form mb_24">
                            <div class="form_wrapper mb_24">
                                <input type="email" id="email" placeholder="Email">
                            </div>

                            <div class="form_wrapper mb_24">
                                <input type="password" id="password" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn_dark">Login</button>
                        </form>

                        <p class="or_text mb_24">or Login with</p>

                        <div class="with_btn mb_36">
                            <button class="btn btn_google">
                                <i class="fa-brands fa-google"></i>
                                Google
                            </button>
                            <button class="btn btn_facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                                Facebook
                            </button>
                        </div>

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
