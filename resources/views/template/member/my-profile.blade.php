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
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row justify_center">
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="profile_left_box">
                                <div class="profile_img_display">
                                    <div class="img_box">
                                        <img src="{{ url('template/images/profile-vector2.jpg')}}" alt="profile picture">
                                    </div>
                                    <h2 class="user_name mb_24">Jhon Doe</h2>
                                </div>

                                <div class="profile_options">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-edit-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edit-profile" type="button" role="tab" aria-controls="v-pills-edit-profile" aria-selected="true">Edit Profile</button>

                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile-picture" type="button" role="tab" aria-controls="v-pills-profile-picture" aria-selected="false">Profile Picture</button>

                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>

                                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about" type="button" role="tab" aria-controls="v-pills-about" aria-selected="false">About</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="offset-xxl-1 col-xxl-8 offset-xl-1 col-xl-8 col-lg-8 col-md-8 col-sm-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-edit-profile" role="tabpanel" aria-labelledby="v-pills-edit-profile-tab">
                                    <h6 class="heading_two mb_36">Edit Profile</h6>

                                    <form action="" class="profile_form mb_24">
                                        <form class="profile_form mb_24" method="POST" action="{{ route("member.profile-update", [auth()->id()]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                        <div class="form_wrapper mb_24">
                                            <label for="name" class="required">Name</label>
                                            <input type="text" name="name" id="name" placeholder="Name" value="{{ auth()->user()->name }}" required>
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="email" class="required">Email</label>
                                            <input type="email" name="email" id="email" disabled placeholder="Email" value="{{ auth()->user()->email }}" required>
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="mobile" class="required">Mobile</label>
                                            <input type="number" name="mobile" id="mobile" placeholder="Mobile" value="{{ auth()->user()->mobile }}" required>
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" value="{{ auth()->user()->address }}" placeholder="Address">
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="profession">Profession</label>
                                            <input type="text" name="profession" id="profession" value="{{ auth()->user()->profession }}" placeholder="Profession">
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="date-of-birth">Date of Birth</label>
                                            <input type="date" name="date_of_birth" value="{{ auth()->user()->date_of_birth }}" id="date_of_birth" placeholder="">
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="nid">National ID</label>
                                            <input type="number" name="nid" id="nid" value="{{ auth()->user()->nid }}" placeholder="">
                                        </div>

                                        <div class="radio_wrapper">
                                            <p>Gender</p>
                                            <div class="radio_wrapper_inner">
                                                <input type="radio" id="male" name="gender" value="female">
                                                <label for="male">Male</label>

                                                <input type="radio" id="female" name="gender" value="female">
                                                <label for="female">Female</label>

                                                <input type="radio" id="others" name="gender" value="others">
                                                <label for="others">Others</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn_dark">Save</button>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-profile-picture" role="tabpanel" aria-labelledby="v-pills-profile-picture-tab">
                                    <h6 class="heading_two mb_36">Profile Picture</h6>

                                    <div class="profile_img_view">
                                        <div class="img_box">
                                            <img src="{{ url('template/images/profile-vector2.jpg')}}" alt="Profile picture">
                                        </div>
                                    </div>

                                    <form action="" class="picture_form mb_24">
                                        <div class="form_wrapper">
                                            <label for="img">Select image:</label>
                                            <input type="file" id="img" name="img" accept="image/*">
                                        </div>
                                        <button type="submit" class="btn btn_dark">Save</button>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <h6 class="heading_two mb_36">Settings</h6>

                                    <form action="" class="profile_form mb_24">
                                        <div class="form_wrapper mb_24">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" placeholder="Email">
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" placeholder="Password">
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="new-password">New Password</label>
                                            <input type="password" name="new-password" id="new-password" placeholder="New Password">
                                        </div>

                                        <div class="form_wrapper mb_24">
                                            <label for="confirm-password">Confirm Password</label>
                                            <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
                                        </div>

                                        <button type="submit" class="btn btn_dark">Save</button>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">
                                    <h6 class="heading_two mb_36">About</h6>

                                    <form action="" class="profile_form mb_24">
                                        <div class="form_wrapper mb_24">
                                            <textarea name="about" id="about" cols="30" rows="10" placeholder="Type here ... "></textarea>
                                        </div>

                                        <button type="submit" class="btn btn_dark">Save</button>
                                    </form>
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
