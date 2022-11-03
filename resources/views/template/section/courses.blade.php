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
