<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>E-commerce</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="aviato" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/frontend/assets/images/favicon.png') }}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{ url('/frontend/assets/plugins/themefisher-font/style.css') }}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ url('/frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    {{-- toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{ url('/frontend/assets/plugins/animate/animate.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ url('/frontend/assets/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ url('/frontend/assets/plugins/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ url('/frontend/assets/css/style.css') }}">

</head>

<body id="body">
    <!-- Main Menu Section -->
    {{-- header --}}
    @include('frontend.fixed.header')
    {{-- body --}}
    @yield('content')

    <!--
Start Call To Action
==================================== -->
    @if (Route::is('homepage'))
        <section class="call-to-action bg-gray section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="title">
                            <h2>SUBSCRIBE TO NEWSLETTER</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam
                                impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                        </div>
                        <div class="col-lg-6 col-md-offset-3">
                            <div class="input-group subscription-form">
                                <input type="text" class="form-control" placeholder="Enter Your Email Address">
                                <span class="input-group-btn">
                                    <button class="btn btn-main" type="button">Subscribe Now!</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->

                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </section> <!-- End section -->
    @endif

    {{-- <section class="section instagram-feed">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>View us on instagram</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="instagram-slider" id="instafeed"
                        data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- footer --}}
    @include('frontend.fixed.footer')

    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{ url('/frontend/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ url('/frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ url('/frontend/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ url('/frontend/assets/plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ url('/frontend/assets/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ url('/frontend/assets/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ url('/frontend/assets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ url('/frontend/assets/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ url('/frontend/assets/plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ url('/frontend/assets/js/script.js') }}"></script>

    // toastr
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}


</body>

</html>
