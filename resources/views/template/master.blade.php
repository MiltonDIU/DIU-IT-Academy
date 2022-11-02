<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cisco Networking Academy</title>
    <link rel="shortcut icon" href="images/fav.png')}}" type="image/x-icon">

    <!-- CSS Start -->
    <link rel="stylesheet" href="{{ url('template/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('template/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ url('template/css/aos.css')}}">
    <link rel="stylesheet" href="{{ url('template/css/style.css')}}">
    <link rel="stylesheet" href="{{ url('template/css/responsive.css')}}">
    <!-- CSS End -->
    @stack('style')
</head>
<body>
<!-- ----------------------- Navbar start ----------------------- -->
<nav class="navbar sticky-top navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{!! Site::config()->logo!=null?Site::config()->logo->getUrl()??url('template/images/cisco-logo.jpg'):url('template/images/cisco-logo.jpg') !!} " alt="DiuITAcademy">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              @foreach(\App\Models\Position::positionWiseMenu(1) as $menu)
                    @if($menu->link_type=='1')
                        <li class="nav-item">
                            <a class="nav-link" href="{{$menu->external_link}}">{{$menu->title}}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{ route('article-details',[$menu->slug]) }}">
                                {{$menu->title}}
                            </a>
                        </li>
                    @endif
                @endforeach
                  @guest
                      <li class="nav-item"> <a class="btn outline_btn_dark" href="{{ route('login') }}">Login</a></li>
                      <li class="nav-item">
                          <a class="btn outline_btn_dark" href="{{ route('register') }}">Sign Up</a>
                      </li>
                  @else


                      <li class="nav-item dropdown profile_item">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <div class="profile_icon">
                                  @if(auth()->user()->avatar)
                                      <img src="{{ auth()->user()->avatar->getUrl() }}" alt="{{ auth()->user()->name }}">
                                  @endif
                              </div>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                              <li>
                                  <a class="dropdown-item" href="{{ route('student.my-profile') }}">Profile</a>
                              </li>
                               <li>
                                  <a class="dropdown-item"  href="{{ route('student.my-course') }}">Course</a>
                              </li>

                              <li>
                                  <a class="dropdown-item"  href="{{ route('student.my-certificate') }}">Certificate</a>
                              </li>

                              <li>
                                  <a class="dropdown-item"  href="{{ route('student.my-community') }}">Community</a>
                              </li>
                              <hr>
                              <li>
                                  <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                      <i class="bi bi-box-arrow-right"></i>
                                      {{ trans('global.logout') }}
                                  </a>
                              </li>
                              <div class="arrow_up"></div>
                          </ul>
                      </li>
                  @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- ----------------------- Navbar end ----------------------- -->
@yield('content')
<!-- ----------------------- Footer part start ----------------------- -->
<footer>
    <!-- ------------------------------ Return to Top start ------------------------------ -->
    <a href="javascript:" id="return-to-top">
        <i class="bi bi-chevron-double-up"></i>
    </a>
    <!-- ------------------------------ Return to Top end ------------------------------ -->

    <div class="footer_top">
        <div class="box">
            <img src="{{ url('template/images/cisco-white-logo.png')}}" alt="Cisco Networking Academy" data-aos="zoom-in" data-aos-delay="200">
        </div>
    </div>

    <div class="footer_main" data-aos="fade-zoom-in" data-aos-delay="200">
        <div class="container">
            <div class="footer_inner footer_social_icon mb_36">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>

            <div class="footer_inner footer_links mb_24">
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">FAQ</a>
                <a href="#">Terms & Conditions</a>
            </div>

            <div class="footer_inner footer_copy_right">
                <p>Copyright © 2022 Cisco Networking Academy. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<!-- ----------------------- Footer part end ----------------------- -->

<!-- Script Start -->
<script src="{{ url('template/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{ url('template/js/bootstrap.bundle.min.js')}}"></script>

<script>
    // ===== Return to Top ====
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 200) {        // If page is scrolled more than 200px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });

    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });
</script>
<script src="{{ url('template/js/aos.js')}}"></script>
<script src="{{ url('template/js/script.js')}}"></script>
<!-- Script End -->

@stack('script')
</body>
</html>
