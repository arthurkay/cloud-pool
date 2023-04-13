<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Localhost - Domain - Serverless </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- preloader end  -->

        <!-- header-area -->
        <header id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="{{route('dashboard.index')}}"><x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /></a>
                        </div>
                    </div>
                    <div class="col-lg-8 order-12 order-lg-0">
                        <div class="menu-area">
                            <div class="main-menu text-right">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="{{route('dashboard.index')}}">Domain</a></li>
                                        <li><a href="">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-5">
                        <div class="menu-icon">
                            <a href="#" data-toggle="modal" data-target="#search-modal"><i class="fas fa-search"></i></a>
                            <a href="{{route('profile.edit')}}" class="user"><i class="far fa-user"></i></a>
                            <!-- Modal Search -->
                            <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form>
                                            <input type="text" placeholder="Search here...">
                                            <button><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->

        <!-- main-area -->
        <main>
            <!-- slider-area -->
            <section class="slider-area fix slider-bg" data-background="img/slider/slider_bg.png">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="slider-content">
                                <h2>Deploy without managing the underlying infrastructure</h2>
                                <p>Get your domain from <span>K400/</span>year</p>
                                <div class="slider-btn">
                                    <a href="#" class="btn">Get Started Now</a>
                                    <a href="#" class="btn transparent-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="slider-img pt-155">
                                <img src="img/slider/slider_img.png" class="alltuchtopdown" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider-area-end -->
            <!-- features-area -->
            <section class="features-area overlay-features">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-features mb-30">
                                <div class="features-icon">
                                    <img src="img/icon/feature_icon01.png" alt="icon">
                                </div>
                                <div class="features-content fix">
                                    <h5>Suprior Speed Performance</h5>
                                    <p>Our free web hosting is powered by top of the line enterprise hardware done.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-features mb-30">
                                <div class="features-icon">
                                    <img src="img/icon/feature_icon02.png" alt="icon">
                                </div>
                                <div class="features-content fix">
                                    <h5>Powerful Control Panel</h5>
                                    <p>Our free web hosting is powered by top of the line enterprise hardware done.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-features mb-30">
                                <div class="features-icon">
                                    <img src="img/icon/feature_icon03.png" alt="icon">
                                </div>
                                <div class="features-content fix">
                                    <h5>Guaranteed 99.9% Uptime</h5>
                                    <p>Our free web hosting is powered by top of the line enterprise hardware done.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- features-area-end -->
            <!-- search-area -->
            <section class="search-area gray-bg pt-145 pb-140">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title search-title text-center mb-40">
                                <h2>Search Domain</h2>
                                <p>The optimal solution for fast reliable websites</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="domain-search">
                                <form action="#" class="p-relative">
                                    <input type="text" placeholder="Enter your domain name here">
                                    <button class="btn ds-btn">Search <i class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <div class="domain-list mb-30 text-center">
                                <ul>
                                    <li><i class="far fa-check-circle"></i> .com $1.99</li>
                                    <li><i class="far fa-check-circle"></i> .net $1.50</li>
                                    <li><i class="far fa-check-circle"></i> .org $5.500</li>
                                    <li><i class="far fa-check-circle"></i> .biz $1.50</li>
                                </ul>
                            </div>
                            <div class="payment-method">
                                <ul>
                                    <li><img src="img/images/payment_method01.png" alt="img"></li>
                                    <li><img src="img/images/payment_method02.png" alt="img"></li>
                                    <li><img src="img/images/payment_method03.png" alt="img"></li>
                                    <li><img src="img/images/payment_method04.png" alt="img"></li>
                                    <li><img src="img/images/payment_method05.png" alt="img"></li>
                                    <li><img src="img/images/payment_method06.png" alt="img"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- search-area-end -->
            <!-- hosting-plan -->
            <section class="hosting-plan-area hplan-bg p-relative pt-145">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title white-title text-center mb-75">
                                <h2>Choose Hosting plan</h2>
                                <p>ametamngcing elit, per sed do eiusmoad teimpor sittem elit inuning ut sed sittem do eiusmod.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-hplan text-center mb-30">
                                <div class="hplan-head">
                                    <span>Shared</span>
                                    <h3>$1.99 <small>/ Mo</small></h3>
                                </div>
                                <div class="hplan-body mb-40">
                                    <p>Total $109.99 every two years</p>
                                    <span>Save 30%</span>
                                    <div class="hplan-icon">
                                        <img src="img/icon/hplan_icon01.png" alt="icon">
                                    </div>
                                </div>
                                <div class="hplan-btn">
                                    <a href="#" class="btn">Purchase</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-hplan active text-center mb-30">
                                <div class="hplan-head">
                                    <span>Dedicated</span>
                                    <h3>$2.99 <small>/ Mo</small></h3>
                                </div>
                                <div class="hplan-body mb-40">
                                    <p>Total $299.99 every two years</p>
                                    <span>Save 20%</span>
                                    <div class="hplan-icon">
                                        <img src="img/icon/hplan_icon02.png" alt="icon">
                                    </div>
                                </div>
                                <div class="hplan-btn">
                                    <a href="#" class="btn">Purchase</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-hplan text-center mb-30">
                                <div class="hplan-head">
                                    <span>VPN</span>
                                    <h3>$3.99 <small>/ Mo</small></h3>
                                </div>
                                <div class="hplan-body mb-40">
                                    <p>Total $399.99 every two years</p>
                                    <span>Save 10%</span>
                                    <div class="hplan-icon">
                                        <img src="img/icon/hplan_icon03.png" alt="icon">
                                    </div>
                                </div>
                                <div class="hplan-btn">
                                    <a href="#" class="btn">Purchase</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- hosting-plan-end -->
            <!-- get-started-area -->
            <section class="getstarted-area gstarted-bg pt-145" data-background="img/bg/world_wide_bg.jpg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title white-title text-center mb-35">
                                <h2>We have server worldwide</h2>
                                <p>ametamngcing elit, per sed do eiusmoad teimpor sittem elit inuning ut sed sittem do eiusmod.</p>
                            </div>
                            <div class="getstarted-btn text-center">
                                <a href="#" class="btn">Get Started Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- get-started-area-end -->
            <!-- cta-area -->
            <section class="cta-area cta-bg pt-95 pb-95" data-background="img/bg/cta_bg.jpg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="cta-content">
                                <h2>Complete Hosting Solutions Only $2.95/mo</h2>
                                <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolor ectetur adipisci adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolor ectetur</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cta-btn text-right">
                                <a href="#" class="btn">Get Started Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cta-area-end -->
        </main>
        <!-- main-area-end -->

        <!-- footer-area -->
        <footer class="footer-bg pt-70">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="logo mb-20">
                                <a href="{{route('dashboard.index')}}"><x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /></a>
                            </div>
                            <div class="footer-text">
                                <p>Gravida nibh vel velit auctor aliquetn quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet
                                nibh vulputate.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="fw-title">
                                <h4>Company</h4>
                            </div>
                            <div class="fw-link">
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Our Team</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Hep</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="fw-title">
                                <h4>Hosting</h4>
                            </div>
                            <div class="fw-link">
                                <ul>
                                    <li><a href="#">VPN Hosting</a></li>
                                    <li><a href="#">Reseller Hosting</a></li>
                                    <li><a href="#">SSD Hosting</a></li>
                                    <li><a href="#">Dedicated Sever</a></li>
                                    <li><a href="#">Web Hosting</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="fw-title">
                                <h4>Subscribe</h4>
                            </div>
                            <div class="f-newsletter mb-30 p-relative">
                                <form action="#">
                                    <input type="email" name="email" placeholder="Enter your mail...">
                                    <button><i class="far fa-envelope"></i></button>
                                </form>
                            </div>
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area black-bg pt-20 pb-20 mt-40">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p>&copy; Copyrights 2023 Localhost All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-md-block">
                            <div class="copyright-credit">
                                {{-- <p>Designed by <a href="#">RaisTheme</a></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->





		<!-- JS here -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/jquery.meanmenu.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
