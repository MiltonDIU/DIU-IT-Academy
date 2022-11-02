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
                <div class="tab-pane fade  show active" id="pills-community" role="tabpanel" aria-labelledby="pills-community-tab">
                    <div class="community_main mt_60">
                        <div class="row justify_center">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <a href="#" class="btn btn_orange">Join Our Facebook Community Group</a>
                            </div>

                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                                <img src="{{ url('template/images/map.png')}}" alt="">
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

@endpush
