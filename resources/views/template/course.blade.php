@extends('template.master')
@section('content')


    <!-- ----------------------- page breadcrumb start ----------------------- -->
<div class="page-breadcrumb section_background_light">
    <div class="container">
                <span>
                    <a href="{{ url('/') }}">Home</a>
                </span>

        <span><i class="bi bi-chevron-right"></i></span>

        <span>Courses</span>

        <i class="bi bi-chevron-right"></i>
    </div>
</div>
<!-- ----------------------- page breadcrumb end ----------------------- -->

{{--<!-- ----------------------- Skills part start ----------------------- -->--}}
{{--<section id="skills_part" class="section_background_light">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">--}}
{{--                <div class="skill_text">--}}
{{--                    <h1 class="heading_one mt_80 mb_48" data-aos="fade-up" data-aos-delay="100">Future Skills</h1>--}}

{{--                    <p data-aos="fade-up" data-aos-delay="200">The Fourth Industrial Revolution (4IR) refers to our current period of rapid technological growth which is fundamentally changing the way we live. A part of this phase of industrial change is the joining of technologies like artificial intelligence, gene editing, to advanced robotics that blur the lines between the physical, digital, and biological worlds.</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="offset-xxl-1 col-xxl-5 offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 col-md-12 col-sm-12">--}}
{{--                <div class="skill_img">--}}
{{--                    <img src="images/skill-img.jpg" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="dots">--}}
{{--        <img src="images/dots2.png" alt="">--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!-- ----------------------- Skills part end ----------------------- -->--}}

<!-- ----------------------- All courses start ----------------------- -->
<section id="all_courses" class="ptb_100">
    <div class="container">
        <div class="section_top">
            <h5 class="heading_section" data-aos="fade-up">Available Courses</h5>
        </div>

        <div class="all_courses_main">
            <div class="row justify_center">

                @foreach($courses as $key=> $course )
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="course_cart" data-aos="fade-up" data-aos-delay="{!! ++$key*100 !!}">
                        <div class="course_img">
{{--                            <img src='{{ url("template/images/courses/course$i.jpg") }}' >--}}
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
                            <p class="course_description mb_24">{!! $course->introduction !!}</p>
<br>
                            <div class="course_btn">
                                <a class="btn cart_btn" href="{{ route('course-details',[$course->id,$course->slug])  }}">
                                    View Course
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

    <div class="dots">
        <img src="{{ url('template/images/dots3.png') }}" alt="">
    </div>
</section>
<!-- ----------------------- All courses end ----------------------- -->
@endsection
