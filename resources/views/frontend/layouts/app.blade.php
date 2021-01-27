@php
    $settings = App\Models\Settings::find(1);
@endphp
<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]>
<html lang="en" class="no-js lt-ie9 lt-ie8">
<![endif]-->
<!--[if IE 8]>
<html lang="en" class="no-js lt-ie9">
<![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<!-- Mirrored from prismspark.com/theme/htm/honeyhome/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2017 04:02:17 GMT -->
<head>
    <!-- meta character set -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HoneyHome</title>
    <!-- Meta Description -->
    <meta name="description" content="Html Template for Builders and Constraction"/>
    <meta name="keywords"
          content="html template, honey home, honeyhome, realestate, construction, architecture, home builder"/>
    <meta name="author" content="PrismSpark"/>
    <!-- mobile configuration -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="frontend/images/favicon.png" type="image/png"/>
    <!--Css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/nivo-lightbox.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/default/default.css') }}"/>
</head>
<body id="body">
<!-- Preloader -->
<div id="preloader">
    <div id="load">&nbsp;</div>
</div>
<!--Preloader End -->


<!-- =========================
  header
  ========================== -->
@include('frontend.layouts.header')
<!--End header-->



<!-- /main site-content-->
<main class="site-content">
    @section('main-content')
    @show
    <!--toper -->
    <div class="toper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-scroll marginbot-30">
                        <a href="#main-slider" id="totop" class="btn btn-circle">
                            <i class="fa fa-angle-double-up animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End toper -->
    <!-- =========================
      Section:footer
      ========================== -->
    <footer>
        <div class="container">
            <div class="row">
                <!--Copy Right Text-->
                <div class="col-md-6">
                    <p>{{ $settings -> crt }} <a href="#">Ruhul Amin</a></p>
                </div>
                <!--Social Media-->
                <div class="col-md-6">
                    <ul class="company-social float-right">
                        @php
                            $social = json_decode($settings -> social);
                        @endphp
                        <li class="social-facebook"><a href="{{ $social -> fb }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="social-twitter"><a href="{{ $social -> tw }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="social-google"><a href="{{ $social -> link }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- /End Section:footer -->
</main>
<!-- /End main site-content-->

<!--/script-->
<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend/js/bootstrap-carousel.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/js/nivo-lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/js/imagesloaded.min.js') }}"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBh-jcDBT5zH9XN1IPjwDP9143Z5BAgnZw"></script>
<script src="{{ asset('frontend/js/model.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
</body>
</html>
