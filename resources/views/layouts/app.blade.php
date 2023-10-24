<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">x</div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="W" class="letters-loading">
                                W
                            </span>
                            <span data-text-preloader="E" class="letters-loading">
                                E
                            </span>
                            <span data-text-preloader="L" class="letters-loading">
                                L
                            </span>
                            <span data-text-preloader="C" class="letters-loading">
                                C
                            </span>
                            <span data-text-preloader="O" class="letters-loading">
                                O
                            </span>
                            <span data-text-preloader="M" class="letters-loading">
                                M
                            </span>
                            <span data-text-preloader="E" class="letters-loading">
                                E
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader End -->

        <!-- Main Header-->
        <header class="main-header header-down">
            <div class="header-top">
                <div class="auto-container">
                    <div class="inner clearfix">
                        <div class="top-left clearfix">
                            <ul class="top-info clearfix">
                                <li><i class="icon far fa-map-marker-alt"></i> Restaurant St, Delicious City, London
                                    9578, UK</li>
                                <li><i class="icon far fa-clock"></i> Daily : 8.00 am to 10.00 pm</li>
                            </ul>
                        </div>
                        <div class="top-right clearfix">
                            <ul class="top-info clearfix">
                                <li><a href="tel:+11234567890"><i class="icon far fa-phone"></i> +1 123 456 7890</a>
                                </li>
                                <li><a href="mailto:booking@restaurant.com"><i class="icon far fa-envelope"></i>
                                        booking@restaurant.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <!-- Main Box -->
                    <div class="main-box clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="index.html" title=""><img
                                        src="{{ asset('storage/images/logo.png') }}" alt=""
                                        title=""></a></div>
                        </div>

                        <div class="nav-box clearfix">
                            <!--Nav Outer-->
                            <div class="nav-outer clearfix">
                                <nav class="main-menu">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="index.html">Home</a>
                                        </li>
                                        <li class="dropdown has-mega-menu"><a href="menu-list.html">Menus</a>
                                            <ul>
                                                <li>
                                                    <div class="mega-menu">
                                                        <div class="menu-inner">
                                                            <div class="auto-container">
                                                                <div class="row clearfix">
                                                                    <div class="menu-block col-lg-3 col-md-6 col-sm-6">
                                                                        <div class="image"><a
                                                                                href="menu-list-1.html"><img
                                                                                    src="{{ asset('storage/images/resource/menu-image-1.jpg') }}"
                                                                                    alt=""></a></div>
                                                                        <div class="title"><a
                                                                                href="menu-list-1.html">Category</a>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="menu-block col-lg-3 col-md-6 col-sm-6">
                                                                        <div class="image"><a
                                                                                href="menu-list-2.html"><img
                                                                                    src="{{ asset('storage/images/resource/menu-image-2.jpg') }}"
                                                                                    alt=""></a></div>
                                                                        <div class="title"><a
                                                                                href="menu-list-2.html">Menu list 2</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="menu-block col-lg-3 col-md-6 col-sm-6">
                                                                        <div class="image"><a
                                                                                href="menu-list-3.html"><img
                                                                                    src="{{ asset('storage/images/resource/menu-image-3.jpg') }}"
                                                                                    alt=""></a></div>
                                                                        <div class="title"><a
                                                                                href="menu-list-3.html">Menu list 3</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="menu-block col-lg-3 col-md-6 col-sm-6">
                                                                        <div class="image"><a
                                                                                href="menu-list-4.html"><img
                                                                                    src="{{ asset('storage/images/resource/menu-image-4.jpg') }}"
                                                                                    alt=""></a></div>
                                                                        <div class="title"><a
                                                                                href="menu-list-4.html">Menu list 4</a>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="our-chef.html">Our chefs</a></li>
                                     
                                        <li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                </nav>
                                <!-- Main Menu End-->
                            </div>
                            <!--Nav Outer End-->

                            <div class="links-box clearfix">
                                <div class="link link-btn">
                                    <a href="reservation-opentable.html" class="theme-btn btn-style-one clearfix">
                                        <span class="btn-wrap">
                                            <span class="text-one">find a table</span>
                                            <span class="text-two">find a table</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="link info-toggler">
                                    <button class="info-btn">
                                        <span class="hamburger">
                                            <span class="top-bun"></span>
                                            <span class="meat"></span>
                                            <span class="bottom-bun"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <!-- Hidden Nav Toggler -->
                            <div class="nav-toggler">
                                <button class="hidden-bar-opener">
                                    <span class="hamburger">
                                        <span class="top-bun"></span>
                                        <span class="meat"></span>
                                        <span class="bottom-bun"></span>
                                    </span>
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!--End Main Header -->

        @include('layouts.alert')
        @yield('content')

         <!--Main Footer-->
    <footer class="main-footer">
        <div class="image-layer" style="background-image: url(images/background/image-4.jpg);"></div>
        <div class="upper-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Footer Col-->
                    <div class="footer-col info-col col-lg-6 col-md-12 col-sm-12">
                        <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="logo"><a href="index.html" title=""><img src="images/logo.png" alt="" title=""></a></div>
                                <div class="info">
                                    <ul>
                                        <li>Restaurant St, Delicious City, London 9578, UK</li>
                                        <li><a href="mailto:booking@domainname.com">booking@domainname.com</a></li>
                                        <li><a href="tel:+88-123-123456">Booking Request : +88-123-123456</a></li>
                                        <li>Open : 09:00 am - 01:00 pm</li>
                                    </ul>
                                </div>
                                <div class="separator"><span></span><span></span><span></span></div>
                                <div class="newsletter">
                                    <h3>Get News & Offers</h3>
                                    <div class="text">Subscribe us & Get <span>25% Off.</span></div>
                                    <div class="newsletter-form">
                                        <form method="post" action="https://kalanidhithemes.com/live-preview/landing-page/delici/all-demo/Delici-Defoult/index.html">
                                            <div class="form-group">
                                                <span class="alt-icon far fa-envelope"></span>
                                                <input type="email" name="email" value="" placeholder="Your email" required>
                                                <button type="submit" class="theme-btn btn-style-one clearfix">
                                                    <span class="btn-wrap">
                                                        <span class="text-one">subscribe</span>
                                                        <span class="text-two">subscribe</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Footer Col-->
                    <div class="footer-col links-col col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <ul class="links">
                                <li><a href="home.html">Home</a></li>
                                <li><a href="menu-list-1.html">Menus</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="our-chef.html">Our chefs</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Footer Col-->
                    <div class="footer-col links-col last col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <ul class="links">
                                <li><a href="#">facebook</a></li>
                                <li><a href="#">instagram</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Youtube</a></li>
                                <li><a href="#">Google map</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright">&copy; 2022 Restaurt. All Rights Reserved   |    Crafted by <a href="https://themeforest.net/user/kalanidhithemes" target="blank">Kalanidhi Themes</a></div>
            </div>
        </div>
    </footer>

</div>
<!--End pagewrapper--> 

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-script.js') }}"></script>
</body>
</html>
