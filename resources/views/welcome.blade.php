<!DOCTYPE html>
<html lang="en">
<head>
    <title>Best Hotels ever</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Playfair+Display:400,700,900 " rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('template/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-xl-2">
                    <h1 class="mb-0 site-logo m-0 p-0"><a href="{{route('home')}}" class="mb-0">HRS</a></h1>
                </div>

                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="#home-section" class="nav-link">Home</a></li>
                            <li><a href="#agents-section" class="nav-link">Services</a></li>
                            <li><a href="#about-section" class="nav-link">About</a></li>
                            <li><a href="{{route('login')}}" class="nav-link">Login</a></li>
                        </ul>
                    </nav>
                </div>


                <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

            </div>
        </div>

    </header>



    <div class="site-blocks-cover overlay" style="background-image: url({{asset('template/images/hero_1.jpg')}});" data-aos="fade" id="home-section">


        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 mt-lg-5 text-center">
                    <h1>We suggest best suitable hotels for you</h1>
                    

                </div>
            </div>
        </div>

        <a href="#howitworks-section" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>


    <div class="py-5 bg-light site-section how-it-works" id="howitworks-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-3">How It Works</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="pr-5">
                        <span class="custom-icon flaticon-house text-primary"></span>
                        <h3 class="text-dark">Find Hotel.</h3>
                        <p>You can search for best hotel using it's name</p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="pr-5">
                        <span class="custom-icon flaticon-coin text-primary"></span>
                        <h3 class="text-dark">Locate the hotel</h3>
                        <p>Locate the hotel using google map</p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="pr-5">
                        <span class="custom-icon flaticon-home text-primary"></span>
                        <h3 class="text-dark">Your Comments</h3>
                        <p>We love to here from you</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section border-bottom" id="agents-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7 text-left">
                    <h2 class="section-title mb-3">Services</h2>
                    <p class="lead">Services will be listed here soon </p>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section" id="about-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">

                    <div class="owl-carousel slide-one-item-alt">
                        <img src="{{asset('template/images/property_4.jpg')}}" alt="Imadge" class="img-fluid">
                        <img src="{{asset('template/images/property_1.jpg')}}" alt="Image" class="img-fluid">
                        <img src="{{asset('template/images/property_2.jpg')}}" alt="Image" class="img-fluid">
                        <img src="{{asset('template/images/property_3.jpg')}}" alt="Image" class="img-fluid">
                    </div>
                    <div class="custom-direction">
                        <a href="#" class="custom-prev">Prev</a><a href="#" class="custom-next">Next</a>
                    </div>

                </div>
                <div class="col-lg-5 ml-auto">

                    <h2 class="section-title mb-3">We Are The Best at recommending hotel to your preference</h2>
                    <p class="lead">Best hotels for you</p>
                    <p>Best of all places on Jimma</p>

                    <ul class="list-unstyled ul-check success">
                        <li>Reliable services</li>
                        <li>We will update every service on all the hotel</li>
                    </ul>

                </div>
            </div>
        </div>
    </section>




    <footer class="site-footer">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="border-top">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

</div> <!-- .site-wrap -->

<script src="{{asset('template/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('template/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('template/js/jquery-ui.js')}}"></script>
<script src="{{asset('template/js/popper.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('template/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('template/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('template/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('template/js/aos.js')}}"></script>
<script src="{{asset('template/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('template/js/jquery.sticky.js')}}"></script>


<script src="{{asset('template/js/main.js')}}"></script>

</body>
</html>
