@extends('template.master')
@section('content')

    <!-- ----------------------- Course main start ----------------------- -->
    <section id="course_main">
        <div class="course_top_banner section_background_light ptb_100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12">
                        <div class="course_banner_box">
                            <h1 class="course_heading mb_48" data-aos="fade-up" data-aos-delay="100">{{ $course->title }}</h1>

                            <p data-aos="fade-up" data-aos-delay="200"> {!! $course->introduction !!} </p>

                            <div class="course_count mt_60" data-aos="fade-up" data-aos-delay="300">
                                <div class="count_box">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <p>{{ count($course->user) }}</p>
                                </div>

                                <div class="count_box">
                                    <i class="bi bi-clock-fill"></i>
                                    <p><span> {{ $course->duration }}</span> </p>
                                </div>
                            </div>

                            <div class="dots">
                                <img src="{{ url('template/images/dots2.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="course_info_small_device" data-aos="fade-up" data-aos-delay="100">
                            <div class="course_info_img mb_24">

                                @if($course->picture)
                                    <img src="{{ $course->picture->getUrl() }}" alt="course_img" class="course image">
                                @endif
                            </div>

                            <div class="course_enrollment_btn mb_36">
                                <a class="btn btn_orange" href="#">Request Enrollment</a>
                            </div>

                            <div class="course_includes mb_36">
                                <h6 class="heading_four mb_12">This Course Includes</h6>

                                <ul class="course_includes_list">

                                    @foreach($course->courseLessons->groupBy('lesson_type_id') as $key=>$lesson)
                                    <li><i class="bi {{ $lesson[0]->lesson_type->css_class }}"></i> {{ count($lesson) }} {{ $lesson[0]->lesson_type->title }}</li>

                                    @endforeach
                                </ul>
                            </div>

                            <div class="course_skills">
                                <h6 class="heading_four mb_12">Skills Covered</h6>

                                <ul class="checkmark">
                                    @foreach($course->skill_covereds as $key=>$skill)
                                        <li>{{ $skill->title }} </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="course_about mt_80">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12">
                        <h3 class="course_section_heading mb_36" data-aos="fade-up" data-aos-delay="100">About this course</h3>
                        <p data-aos="fade-up" data-aos-delay="200">
                            {!! $course->about_this_course !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="course_content mt_80">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12">
                        <h4 class="course_section_heading mb_36" data-aos="fade-up" data-aos-delay="100">Course Content</h4>

                        <div class="coures_content_box mb_100" data-aos="fade-up" data-aos-delay="200">
                            <div class="accordion" id="accordionExample">

                                 @foreach( $course->courseLessons->groupBy('course_content_type_id') as $key=>$course_types)
                                 <div class="accordion-item">
                                     <h2 class="accordion-header" id="headingOne{{$key}}">
                                         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$key}}" aria-expanded="{{ $key==0?"true":"false" }}" aria-controls="collapseOne{{$key}}">
                                             {{ $course_types[0]->course_content_types->title  }}
                                         </button>
                                     </h2>

                                     <div id="collapseOne{{$key}}" class="accordion-collapse collapse {{ $key==1?"show":"" }}" aria-labelledby="headingOne{{$key}}" data-bs-parent="#accordionExample">
                                         <div class="accordion-body">

                                             <ul class="checkmark">
                                                 @foreach($course_types as $lesson)
                                                     @if($lesson->lesson_type_id==2)
                                                         <li>
                                                             {{ $lesson->title }}
                                                             <span class="course_quiz">
                                                         <i class="bi bi-question-circle-fill"></i>
                                                     </span>
                                                         </li>
                                                     @else
                                                         <li> {{ $lesson->title }}</li>
                                                     @endif
                                                 @endforeach
                                             </ul>

                                         </div>
                                     </div>
                                 </div>
                                 @endforeach
                             </div>
                         </div>
                     </div>

                     <div class="offset-xxl-1 col-xxl-4 offset-xl-1 col-xl-4 offset-lg-1 col-lg-4 col-md-12 col-sm-12">
                         <div class="course_info">
                             <div class="course_info_img mb_24">
                                 @if($course->picture)
                                     <img src="{{ $course->picture->getUrl() }}" alt="course_img" class="course image">
                                 @endif
                             </div>

                             <div class="course_enrollment_btn mb_36">
@guest
     <form method="POST" action="{{ route("courses-enrollment") }}" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="course_id" value="{{ $course->id }}">
         <button type="submit" class="btn btn_orange">
             Request Enrollment
         </button>
     </form>
@else
     @if(\App\Helpers\SettingsHelper::enrollment($course->id)==true)
         <a href="{{ route('my-course') }}" class="btn btn_orange"> Start lesson </a>
     @else
         <form method="POST" action="{{ route("courses-enrollment") }}" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="course_id" value="{{ $course->id }}">
             <button type="submit" class="btn btn_orange">
                 Request Enrollment
             </button>
         </form>
     @endif
@endguest


                             </div>

                             <div class="course_includes mb_36">
                                 <h6 class="heading_four mb_12">This Course Includes</h6>

                                 <ul class="course_includes_list">

                                     @foreach($course->courseLessons->groupBy('lesson_type_id') as $key=>$lesson)
                                         <li><i class="bi {{ $lesson[0]->lesson_type->css_class }}"></i> {{ count($lesson) }} {{ $lesson[0]->lesson_type->title }}</li>
                                     @endforeach
                                 </ul>
                             </div>

                             <div class="course_skills">
                                 <h6 class="heading_four mb_12">Skills Covered</h6>

                                 <ul class="checkmark">
                                     @foreach($course->skill_covereds as $key=>$skill)
                                         <li>{{ $skill->title }} </li>
                                     @endforeach
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- ----------------------- Course main end ----------------------- -->
 @endsection
 @push('style')
     <style>
        .course_content .accordion-item{
             padding-bottom: 10px;
         }
     </style>


 @endpush
