@extends('template.master')
@section('content')

    <!-- ----------------------- page breadcrumb start ----------------------- -->
    <div class="page-breadcrumb">
        <div class="container">
                <span>
                    <a href="{{ url('/') }}">Home</a>
                </span>

            <span><i class="bi bi-chevron-right"></i></span>

            <span>{{ Route::current()->slug}}</span>

            <i class="bi bi-chevron-right"></i>
        </div>
    </div>
    <!-- ----------------------- page breadcrumb end ----------------------- -->

    <!-- ----------------------- about start ----------------------- -->
    <section id="about_part" class="mt_80 mb_100">
        <div class="container">
            <div class="row justify_center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-sm-12">
                    <div class="text_part">
                        <div class="box" data-aos="fade-up" data-aos-delay="100">
                            <h1 class="heading_two mb_36">A Future Skills Academy For The Nation</h1>

                           {!! $article->content !!}

                            <a class="btn btn_dark" href="#" data-aos="fade-up">Join Free</a>
                        </div>
                    </div>
                </div>
                @if($article->feature_image!=null)
                    <div class="offset-xxl-1 col-xxl-5 offset-xl-1 col-xl-5 col-lg-6 col-md-8 col-sm-10">
                        <div class="img_part" data-aos="fade-zoom-in" data-aos-delay="200">
                            <img src="{{$article->feature_image->getUrl()}}" alt="{{$article->title}}">
                        </div>
                    </div>
                @endif

            </div>
        </div>

        <div class="dots">
            <img src="{{ url('template/images/dots3.png') }}" alt="">
        </div>
    </section>
    <!-- ----------------------- about end ----------------------- -->

    <!-- ----------------------- Team start ----------------------- -->
    <section id="team" class="mt_120 ptb_100 section_background_light">
        <div class="top_part">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9 col-sm-12">
                        <h3 class="text_orange mb_24" data-aos="fade-up" data-aos-delay="100">Cisco Networking Academy</h3>
                        <h6 class="heading_two mb_48" data-aos="fade-up" data-aos-delay="200">Meet our team of creative experts</h6>
                    </div>

                    <div class="offset-xxl-1 col-xxl-5 offset-xl-1 col-xl-5 offset-lg-1 col-lg-5 col-md-9 col-sm-12">
                        <div class="right_text" data-aos="fade-up" data-aos-delay="200">
                            <p class="mt_60">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque dicta optio deserunt alias natus magni suscipit accusantium nihil!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom_part mt_60">
            <div class="container">
                <div class="row justify_center">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-8">
                        <div class="team_cart" data-aos="fade-up" data-aos-delay="200">
                            <div class="team_img mb_24">
                                <img src="images/team/2.png" alt="">
                            </div>
                            <h6 class="team_name">Tony Brennand</h6>
                            <p class="text_orange">HR Executive</p>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-8">
                        <div class="team_cart" data-aos="fade-up" data-aos-delay="300">
                            <div class="team_img mb_24">
                                <img src="images/team/3.png" alt="">
                            </div>
                            <h6 class="team_name">Suzana Andjelkovic</h6>
                            <p class="text_orange">HR Executive</p>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-8">
                        <div class="team_cart" data-aos="fade-up" data-aos-delay="400">
                            <div class="team_img mb_24">
                                <img src="images/team/1.png" alt="">
                            </div>
                            <h6 class="team_name">Jhon Doe</h6>
                            <p class="text_orange">HR Executive</p>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-8">
                        <div class="team_cart" data-aos="fade-up" data-aos-delay="500">
                            <div class="team_img mb_24">
                                <img src="images/team/4.png" alt="">
                            </div>
                            <h6 class="team_name">Eve Alyna</h6>
                            <p class="text_orange">HR Executive</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dots">
            <img src="images/dots4.png" alt="">
        </div>
    </section>
    <!-- ----------------------- Team end ----------------------- -->

    <!-- ----------------------- Partner start ----------------------- -->
    <section id="partner">
        <div class="container">
            <div class="row justify_center">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <h6 class="heading_section">Our Partners</h6>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="partner_cart">
                        <a href="#" target="_blank">
                            <img src="images/cisco-logo.jpg" alt="Cisco Networking Academy">
                        </a>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="partner_cart">
                        <a href="https://daffodilvarsity.edu.bd/" target="_blank">
                            <img src="images/diu_logo.png" alt="Daffodil International University">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ----------------------- Partner end ----------------------- -->


    <section id="about_us" class="section_padding mb-125">
        <div class="container">
            <div class="content_part mb-125">
                <div class="section_title mb-50">
                    <p class="text_red mb-16" data-aos="fade-up" data-aos-delay="100">SBAC</p>
                    <h2 class="heading_one text_blue" data-aos="fade-up" data-aos-delay="300">{{$article->title}}</h2>
                </div>
                @if($article->feature_image!=null)
                    <div class="content_text " data-aos="fade-up" data-aos-delay="300">
                        <div  style="width: 100%; margin: 0 auto" data-aos="fade-up" data-aos-delay="100">
                            <img width="100%" src="{{$article->feature_image->getUrl()}}" alt="{{$article->title}}">
                        </div>
                    </div>
                @endif
                <div class="content_text text_justify" data-aos="fade-up" data-aos-delay="500">
                    <p class="mb-50">  {!! $article->content !!} </p>
                </div>

            </div>
        </div>
    </section>
@endsection



@section('style')

@endsection

@section('script')

@endsection
