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
                    <a class="nav-link active" href="{{ route('my-profile') }}">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ route('my-course') }}">Course</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ route('my-certificate') }}">Certificate</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ route('my-community') }}">Community</a>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade  show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
                    <h6 class="heading_two mb_36">My Courses</h6>
                    <div class="my_courses">
                        <div class="row justify_center">

                            @foreach(auth()->user()->course as $course)

                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="course_cart" data-aos="fade-up" data-aos-delay="100">
                                    <div class="course_img">

                                        @if($course->picture)
                                            <img src="{{ $course->picture->getUrl() }}" alt="course_img" class="c_img">
                                        @endif


                                        <div class="course_count">
                                            <div class="count_box">
                                                <i class="bi bi-person-lines-fill"></i>
                                                <p>{{ count($course->user) }}</p>
                                            </div>

                                            <div class="count_box">
                                                <i class="bi bi-clock-fill"></i>
                                                <p><span>{{ $course->duration }}</span> </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="course_details">
                                        <h6 class="heading_three mb_24">{{ $course->title }}</h6>
{{--                                        <p class="course_description mb_24">CISCO Networking Academy</p>--}}

                                        <div class="course_completion_main mb_36">
                                            <div class="main_completion_bar mb_12">
                                                <div class="completed_bar"></div>
                                            </div>
                                            <p class="completion_text">60% Complete</p>
                                        </div>

                                        <div class="course_btn">
                                            <a class="btn cart_btn" href="#">
                                                Start Learning
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ----------------------- profile start ----------------------- -->

@endsection
@push('style')

@endpush
