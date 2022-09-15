@extends('template.master')
@section('content')
    <!-- ----------------------- Main Banner start ----------------------- -->
    <section id="main_banner">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12">
                    <div class="banner_text">
                        <h6 class="text_orange mb_12" data-aos="fade-zoom-in">Cisco Networking Academy</h6>
                        <h1 class="heading_one mb_24" data-aos="fade-up" data-aos-delay="100">{{ $slider->title }}</h1>
                        <p class="text_light mb_48" data-aos="fade-up" data-aos-delay="200">{{ $slider->sub_title }}</p>

{{--                        <div class="banner_search" data-aos="fade-up" data-aos-delay="300">--}}
{{--                            <form action="" class="search_form">--}}
{{--                                <div class="form_wrapper job_title_box">--}}
{{--                                    <input type="text" placeholder="Find Courses" class="banner_search_input">--}}
{{--                                </div>--}}
{{--                                <button type="submit"><i class="bi bi-search"></i></button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="offset-xxl-1 col-xxl-6 col-xl-7 col-lg-7 col-md-12 col-sm-12">
                    <div class="banner_img" data-aos="fade-left" data-aos-delay="100" data-aos-duration="2000">
                        <div class="img_wrapper">
                            @if($slider->slider_image)
                                   <img src="{{ $slider->slider_image->getUrl() }}" alt="Cisco Networking Academy">
                            @endif
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ----------------------- Main Banner end ----------------------- -->

    <!-- ----------------------- Get Started start ----------------------- -->
    <section id="get_started">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-12">
                    <div class="left_text" data-aos="fade-zoom-in" data-aos-delay="200">
                        <h3 class="heading_two">Upskill Yourself</h3>
                        <h4 class="heading_two mb_48">Reach Professional Goals</h4>

                        <a class="btn outline_btn_white" href="#">Get Started</a>
                    </div>
                </div>

                <div class="offset-xxl-1 col-xxl-5 offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 col-md-9 col-sm-12">
                    <div class="right_text" data-aos="fade-zoom-in" data-aos-delay="200">
                        <p>Cisco Networking Academy is designed to prepare young minds for the future industry through an exciting journey of transformative upskilling.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="dots">
            <img src="{{ url('template/images/dots1.png')}}" alt="">
        </div>
    </section>
    <!-- ----------------------- Get Started end ----------------------- -->

    <!-- ----------------------- Course part start ----------------------- -->
    <section id="course_part" class="mt_120 mb_48">
        <div class="container">
            <div class="section_top" data-aos="fade-zoom-in" data-aos-delay="200">
                <h5 class="heading_section">Courses</h5>
                <a class="btn outline_btn_dark" href="#">ALl Courses</a>
            </div>

            <div class="row justify_center">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="course_cart" data-aos="fade-up" data-aos-delay="100">
                        <div class="course_img">
                            <img src="{{ url('template/images/courses/course1.jpg')}}" alt="course_img" class="c_img">

                            <div class="course_count">
                                <div class="count_box">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <p>100</p>
                                </div>

                                <div class="count_box">
                                    <i class="bi bi-clock-fill"></i>
                                    <p><span>4.5</span> Hrs</p>
                                </div>
                            </div>
                        </div>

                        <div class="course_details">
                            <h6 class="heading_three mb_24">Introduction to Cybersecurity</h6>
                            <p class="course_description mb_24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error, aliquam.</p>

                            <div class="course_btn">
                                <a class="btn cart_btn" href="#">
                                    View Course
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="course_cart" data-aos="fade-up" data-aos-delay="300">
                        <div class="course_img">
                            <img src="{{ url('template/images/courses/course2.jpg')}}" alt="course_img" class="c_img">

                            <div class="course_count">
                                <div class="count_box">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <p>100</p>
                                </div>

                                <div class="count_box">
                                    <i class="bi bi-clock-fill"></i>
                                    <p><span>4.5</span> Hrs</p>
                                </div>
                            </div>
                        </div>

                        <div class="course_details">
                            <h6 class="heading_three mb_24">Introduction to Cybersecurity</h6>
                            <p class="course_description mb_24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error, aliquam.</p>

                            <div class="course_btn">
                                <a class="btn cart_btn" href="#">
                                    View Course
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="course_cart" data-aos="fade-up" data-aos-delay="500">
                        <div class="course_img">
                            <img src="{{ url('template/images/courses/course3.jpg')}}" alt="course_img" class="c_img">

                            <div class="course_count">
                                <div class="count_box">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <p>100</p>
                                </div>

                                <div class="count_box">
                                    <i class="bi bi-clock-fill"></i>
                                    <p><span>4.5</span> Hrs</p>
                                </div>
                            </div>
                        </div>

                        <div class="course_details">
                            <h6 class="heading_three mb_24">Introduction to Cybersecurity</h6>
                            <p class="course_description mb_24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error, aliquam.</p>

                            <div class="course_btn">
                                <a class="btn cart_btn" href="#">
                                    View Course
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="course_cart" data-aos="fade-up" data-aos-delay="100">
                        <div class="course_img">
                            <img src="{{ url('template/images/courses/course4.png')}}" alt="course_img" class="c_img">

                            <div class="course_count">
                                <div class="count_box">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <p>100</p>
                                </div>

                                <div class="count_box">
                                    <i class="bi bi-clock-fill"></i>
                                    <p><span>4.5</span> Hrs</p>
                                </div>
                            </div>
                        </div>

                        <div class="course_details">
                            <h6 class="heading_three mb_24">Introduction to Cybersecurity</h6>
                            <p class="course_description mb_24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error, aliquam.</p>

                            <div class="course_btn">
                                <a class="btn cart_btn" href="#">
                                    View Course
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="course_cart" data-aos="fade-up" data-aos-delay="300">
                        <div class="course_img">
                            <img src="{{ url('template/images/courses/course5.png')}}" alt="course_img" class="c_img">

                            <div class="course_count">
                                <div class="count_box">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <p>100</p>
                                </div>

                                <div class="count_box">
                                    <i class="bi bi-clock-fill"></i>
                                    <p><span>4.5</span> Hrs</p>
                                </div>
                            </div>
                        </div>

                        <div class="course_details">
                            <h6 class="heading_three mb_24">Introduction to Cybersecurity</h6>
                            <p class="course_description mb_24">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error, aliquam.</p>

                            <div class="course_btn">
                                <a class="btn cart_btn" href="#">
                                    View Course
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dots">
            <img src="{{ url('template/images/dots2.png')}}" alt="">
        </div>
    </section>
    <!-- ----------------------- Course part end ----------------------- -->

    <!-- ----------------------- Learner outcomes start ----------------------- -->
    <section id="learner_outcomes" class="mt_48 ptb_100">
        <div class="top_part">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-12">
                        <div class="left_text" data-aos="fade-zoom-in" data-aos-delay="200">
                            <h3 class="text_orange mb_24">Cisco Networking Academy</h3>
                            <h4 class="heading_two mb_48">Designed to prepare young minds for the future</h4>

                            <a class="btn outline_btn_dark" href="#">Get Started</a>
                        </div>
                    </div>

                    <div class="offset-xxl-1 col-xxl-5 offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 col-md-9 col-sm-12">
                        <div class="right_text" data-aos="fade-zoom-in" data-aos-delay="200">
                            <p class="mt_60">Cisco Networking Academy builds the foundation of self-confidence to reach your desired destination beyond all mental barriers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom_part mt_100">
            <div class="container">
                <div class="grid_container">
                    <div class="grid_img" data-aos="fade-right" data-aos-delay="200">
                        <img src="{{ url('template/images/outcome-img-2.png')}}" alt="">
                    </div>

                    <div class="grid_text">
                        <p>Become a part of the only academia industry upskill community</p>
                    </div>

                    <div class="grid_img_text grid_img">
                        <img src="{{ url('template/images/outcome-img-1.webp')}}" alt="">
                        <div class="overlay">
                            <p>Grow your business like a 21st century entrepreneur</p>
                        </div>
                    </div>

                    <div class="grid_img" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ url('template/images/outcome-img-3.png')}}" alt="">
                    </div>

                    <div class="grid_text">
                        <p>Network with industry professionals</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="dots">
            <img src="{{ url('template/images/dots2.png')}}" alt="">
        </div>
    </section>
    <!-- ----------------------- Learner outcomes end ----------------------- -->

    <!-- ----------------------- Join part start ----------------------- -->
    <section id="join_part" class="mt_120 mb_100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12">
                    <div class="img_part" data-aos="fade-zoom-in" data-aos-delay="400">
                        <img src="{{ url('template/images/join-img.png')}}" alt="">
                    </div>
                </div>

                <div class="offset-xxl-1 col-xxl-6 offset-xl-1 col-xl-6 offset-lg-1 col-lg-6 col-md-12 col-sm-12">
                    <div class="text_part">
                        <div class="box">
                            <h6 class="heading_two mb_48" data-aos="fade-up" data-aos-delay="200">Start your journey with GP Academy and get set to reach towards your personal and professional goals! </h6>

                            <p class="text_orange mb_48" data-aos="fade-up" data-aos-delay="300">Start your upskilling journey now!</p>

                            <a class="btn btn_dark" href="#" data-aos="fade-up" data-aos-delay="400">Join Free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dots">
            <img src="{{ url('template/images/dots2.png')}}" alt="">
        </div>
    </section>
    <!-- ----------------------- Join part end ----------------------- -->

    <!-- ----------------------- Testimonial part start ----------------------- -->
    <section id="testimonial_part" class="mt_120 ptb_100">
        <div class="container">
            <div class="section_top">
                <h5 class="heading_section">Why Choose Us?</h5>
            </div>

            <div class="grid_container">
                <div class="grid_item grid_col_span_2 background_blue" data-aos="fade-up" data-aos-delay="100">
                    <div class="testi_profile">
                        <div class="testi_img mb_36">
                            <img src="{{ url('template/images/testimonial/testi1.jpg')}}" alt="">
                        </div>

                        <div class="testi_profile_details">
                            <p class="testi_name">Jhon Doe</p>
                            <p class="testi_profession">IT Professional</p>
                        </div>
                    </div>

                    <div class="testi_heading mb_24">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, ad.</p>
                    </div>

                    <div class="testi_text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque non numquam nihil consectetur ipsum iusto quas amet, accusamus corrupti animi est ipsam corporis in deleniti ab cumque porro! Sunt, aspernatur.</p>
                    </div>
                </div>

                <div class="grid_item background_light_blue" data-aos="fade-up" data-aos-delay="200">
                    <div class="testi_profile">
                        <div class="testi_img mb_36">
                            <img src="{{ url('template/images/testimonial/testi2.png')}}" alt="">
                        </div>

                        <div class="testi_profile_details">
                            <p class="testi_name">Jhon Doe</p>
                            <p class="testi_profession">IT Professional</p>
                        </div>
                    </div>

                    <div class="testi_heading mb_24">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>

                    <div class="testi_text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, pariatur?</p>
                    </div>
                </div>

                <div class="grid_item grid_row_span_2 background_white" data-aos="fade-up" data-aos-delay="300">
                    <div class="testi_profile">
                        <div class="testi_img mb_36">
                            <img src="{{ url('template/images/testimonial/testi3.jpg')}}" alt="">
                        </div>

                        <div class="testi_profile_details">
                            <p class="testi_name">Jhon Doe</p>
                            <p class="testi_profession">IT Professional</p>
                        </div>
                    </div>

                    <div class="testi_heading mb_24">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, dolore?</p>
                    </div>

                    <div class="testi_text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis sit repellat quam ullam maxime reprehenderit harum nostrum cum, voluptatibus qui consectetur illo, sed doloremque nemo esse vel? Provident ipsam rem, iste molestiae maiores quaerat iusto ratione debitis enim voluptatum consequuntur porro itaque voluptatem earum perferendis laborum voluptas necessitatibus est. Debitis repudiandae maiores quaerat iusto ratione.</p>
                    </div>
                </div>

                <div class="grid_item background_gray" data-aos="fade-up" data-aos-delay="200">
                    <div class="testi_profile">
                        <div class="testi_img mb_36">
                            <img src="{{ url('template/images/testimonial/testi4.jpg')}}" alt="">
                        </div>

                        <div class="testi_profile_details">
                            <p class="testi_name">Jhon Doe</p>
                            <p class="testi_profession">IT Professional</p>
                        </div>
                    </div>

                    <div class="testi_heading mb_24">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>

                    <div class="testi_text">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos consequatur distinctio adipisci!</p>
                    </div>
                </div>

                <div class="grid_item grid_col_span_2 background_dark" data-aos="fade-up" data-aos-delay="300">
                    <div class="testi_profile">
                        <div class="testi_img mb_36">
                            <img src="{{ url('template/images/testimonial/testi5.jpg')}}" alt="">
                        </div>

                        <div class="testi_profile_details">
                            <p class="testi_name">Jhon Doe</p>
                            <p class="testi_profession">IT Professional</p>
                        </div>
                    </div>

                    <div class="testi_heading mb_24">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita minima ratione omnis unde quae minus.</p>
                    </div>

                    <div class="testi_text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptatum enim asperiores nisi optio odit vel tempore molestiae nesciunt sapiente dolorem quia, eveniet consectetur voluptatem, libero aspernatur. Vero minima vitae.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="dots">
            <img src="{{ url('template/images/dots2.png')}}" alt="">
        </div>
    </section>
    <!-- ----------------------- Testimonial part end ----------------------- -->
@endsection
