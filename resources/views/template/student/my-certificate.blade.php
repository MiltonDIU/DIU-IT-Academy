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
                <div class="tab-pane fade  show active" id="pills-certificate" role="tabpanel" aria-labelledby="pills-certificate-tab">
                    <h6 class="heading_two mb_36">My Certificates</h6>

                    <div class="certificate_main">
                        <div class="row justify_center">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="certificate_box">
                                    <div class="certificate_img mb_24">
                                        <img src="{{ url('template/images/certificates/certificate.png')}}" alt="Certificate">
                                    </div>

                                    <h6 class="heading_three mb_24">Introduction to Cybersecurity</h6>

                                    <a href="{{ url('template/images/certificates/certificate.png')}}" class="btn btn_dark" target="_blank" download>Download</a>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="certificate_box">
                                    <div class="certificate_img mb_24">
                                        <img src="{{ url('template/images/certificates/certificate.png')}}" alt="Certificate">
                                    </div>

                                    <h6 class="heading_three mb_24">Introduction to Cybersecurity</h6>

                                    <a href="{{ url('template/images/certificates/certificate.png')}}" class="btn btn_dark" target="_blank" download>Download</a>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="certificate_box">
                                    <div class="certificate_img mb_24">
                                        <img src="{{ url('template/images/certificates/certificate.png')}}" alt="Certificate">
                                    </div>

                                    <h6 class="heading_three mb_24">Introduction to Cybersecurity</h6>

                                    <a href="{{ url('template/images/certificates/certificate.png')}}" class="btn btn_dark" target="_blank" download>Download</a>
                                </div>
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
