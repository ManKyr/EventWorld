<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <section id="openg">
        @yield('opengraph')        
    </section>

    <title>@yield('title')</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon_ew.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(window).on('load', function() { // makes sure the whole site is loaded 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({'overflow':'visible'});
        })
    </script>

    <!-- Fonts -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Leaflet Includes -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
</head>
<body>

<div id="preloader">

</div>

    <header id="header" class="fixed-top header">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-xl-11 d-flex align-items-center">
              <h1 class="logo mr-auto"><a href="/"><img src="{{ asset('assets/img/logo_eventworld.png')}}"></a></h1>
              <!-- Uncomment below if you prefer to use an image logo -->
              <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
              <nav class="nav-menu d-none d-lg-block">
                  <ul>
                  <li class="{{ Request::path() === '/' ? 'active' : ''}}"><a href="/">Home</a></li>
                  @auth
                    @if(auth()->check())
                      @if(auth()->user()->isAdmin())
                      <li class="{{ Request::path() === 'admin' ? 'active' : ''}}"><a href="/admin">Admin Panel</a></li>
                      @else
                      <li class="{{ Request::path() === 'events' ? 'active' : ''}}"><a href="/events">EventWall</a></li>
                      @endif
                    @endif
                  @endauth
                  <li class="{{ Request::path() === 'about' ? 'active' : ''}}"><a href="/about">About Us</a></li>
                  <li class="{{ Request::path() === '/#contact' ? 'active' : ''}}"><a href="{{ Request::path() === '/' ? '#contact' : '/#contact'}}">Contact Us</a></li>
                  @guest
                            @if (Route::has('login'))
                                <li class="pl-3 pt-1 login_button">
                                    <a class="btn btn-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="pl-2 pt-1 register_button">
                                    <a class="btn btn-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src=@if(empty(Auth::user()->profile_image)) "{{ asset('assets/img/users/default-profile-image.jpg')}}" @else "{{ asset('assets/img/users')}}/{{Auth::user()->profile_image}}" @endif alt="dropdown image" class="image_user">
                                    <!--{{ Auth::user()->firstname }}-->                                 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item user-item-dropdown" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item user-item-dropdown" href="{{ route('preferences') }}">
                                        {{ __('My Preference List') }}
                                    </a>
                                    <a class="dropdown-item user-item-dropdown" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>
              </nav><!-- .nav-menu -->
            </div>
          </div>
        </div>
      </header><!-- End Header -->
      <main>
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5fd8a29b5be97700184ab6ca&product=inline-share-buttons' async='async'></script>        @yield('content')
      </main>

    <footer id="footer">
        <div class="footer-top">
        <div class="container">
            <div class="row">

            <div class="col-lg-4 col-md-6 footer-info">
                <h3><img src="{{ asset('assets/img/logo_eventworld.png')}}" width='160px' height='26px'></h3>
                <p>An online application through which users can be informed about upcoming music events in Greece, in their city or close to them.</p>
            </div>

            <div class="col-lg-4 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                <li><i class="ion-ios-arrow-right"></i> <a href="/">Home</a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="/about">About us</a></li>
                <li><i class="ion-ios-arrow-right {{ Request::path() === '/#services' ? 'active' : ''}}"></i> <a href="{{ Request::path() === '/' ? '#services' : '/#services'}}">Services</a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="/terms">Terms of service</a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="/privacy_policy">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-contact">
                <h4>Contact Us</h4>
                <p>
                Egnatias, 232 <br>
                Thessaloniki, SKG 54248<br>
                Greece <br>
                <strong>Phone:</strong> +30 699 999 9999<br>
                <strong>Email:</strong> ev3ntworld@gmail.com<br>
                </p>

                <div class="social-links">
                <!--<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>-->
                <a href="https://www.facebook.com/EventWorld-101156751911012" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/eventworldgr" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://twitter.com/EventWorld6" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/company/eventworldgr" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                </div>

            </div>

            </div>
        </div>
        </div>

        <div class="container">
        <div class="copyright">
            &copy; Copyright {{ date("Y") }} <strong>{{ config('app.name', 'EventWorld') }}</strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
            Designed by <a href="https://eventworld.smach.gr">KyMa</a>
        </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>



    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/counterup/counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/venobox/venobox.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js')}}"></script>

@yield('scripts')
</body>
</html>

