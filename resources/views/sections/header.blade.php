<!--Full width header Start-->
<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header homestyle">
        <!-- Menu Start -->
        <div class="menu-area">
            <div class="container-fluid">
                <div class="row rs-vertical-middle">
                    <div class="col-lg-2">
                        <div class="logo-area">
                            <a href="{{ route('homepage') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 mobile-menu-area">
                        <div class="rs-menu-area display-flex-center">
                            <div class="main-menu">
                                <a class="rs-menu-toggle">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <nav class="rs-menu">
                                    <div class="expand-btn">
                                        <span>
                                                    <a id="nav-expander" class="nav-expander">
                                                        <ul class="offcanvas-icon">
                                                            <li>
                                                                <span class="hamburger1"></span>
                                                                <span class="hamburger2"></span>
                                                                <span class="hamburger3"></span>
                                                            </li>
                                                        </ul>
                                                    </a>
                                                </span>
                                    </div>
                                    <ul class="nav-menu text-right">
                                        <!-- Home -->
                                        <li class="@if(Route::currentRouteName() == 'homepage') current-menu-item current_page_item @endif">
                                            <a
                                                    href="{{ route('homepage') }}" class="home">Pagrindinis</a>
                                        </li>
                                        <!-- End Home -->

                                        <!-- Club Directory Menu Start -->
                                        <li class="@if(in_array(Route::currentRouteName(), ['club.contacts', 'club.administration', 'club.history', 'club.stadiums'])) current-menu-item current_page_item @endif menu-item-has-children">
                                            <a href="{{ route('club.history') }}">Klubas</a>
                                            <ul class="sub-menu">
                                                <li class="@if(Route::currentRouteName() == 'club.history') active @endif">
                                                    <a href="{{ route('club.history') }}">Istorija</a></li>
                                                <li class="@if(Route::currentRouteName() == 'club.contacts') active @endif"><a
                                                            href="{{ route('club.contacts') }}">Kontaktai</a></li>
                                                <li class="@if(Route::currentRouteName() == 'club.administration') active @endif">
                                                    <a href="{{ route('club.administration') }}">Administracija</a></li>
                                                <li class="@if(Route::currentRouteName() == 'club.stadiums') active @endif">
                                                    <a href="{{ route('club.stadiums') }}">Stadionai</a></li>
                                            </ul>
                                        </li>
                                        <!--Club Directory Menu End -->
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Canvas Menu start -->
        <nav class="right_menu_togle hidden-md">
            <div class="close-btn"><span id="nav-close" class="text-center"><i class="flaticon-cross"></i></span></div>
            <div class="canvas-logo">
                <a href="{{ route('homepage') }}"><img src="{{ asset('images/logo-dark.png') }}" alt="logo"></a>
            </div>
            <div class="sidebarnav_menu">
                <ul>
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="match-fixtures.html">Match Fixtures</a></li>
                    <li><a href="blog.html">News</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="canvas-contact">
                <h5 class="canvas-contact-title">Contact Info</h5>
                <ul class="contact">
                    <li><i class="fa fa-globe"></i>New York, USA</li>
                    <li><i class="fa fa-phone"></i><a href="tel:+125427263512">+125427263512</a></li>
                    <li><i class="fa fa-envelope"></i><a href="mailto:support@rstheme.com">support@rstheme.com</a></li>
                </ul>
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </nav>
        <!-- Canvas Menu end -->
    </header>
    <!--Header End-->
</div>
<!--Full width header End-->