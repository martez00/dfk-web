<!--Full width header Start-->
<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header homestyle">
        <!-- Menu Start -->
        <div class="menu-area">
            <div class="container-fluid">
                <div class="row rs-vertical-middle">
                    <div class="col-lg-3">
                        <div class="logo-area">
                            <a href="{{ route('homepage') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 mobile-menu-area">
                        <div class="rs-menu-area display-flex-center">
                            <div class="main-menu">
                                <a class="rs-menu-toggle">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <nav class="rs-menu">
                                    <ul class="nav-menu text-right">
                                        <!-- Home -->
                                        <li class="@if(Route::currentRouteName() == 'homepage') current-menu-item current_page_item @endif">
                                            <a href="{{ route('homepage') }}">Pagrindinis</a>
                                        </li>
                                        <!-- End Home -->

                                        <!-- Club Directory Menu Start -->
                                        <li class="@if(in_array(Route::currentRouteName(), ['club.contacts', 'club.administration', 'club.history', 'club.stadiums'])) current-menu-item current_page_item @endif menu-item-has-children">
                                            <a href="{{ route('club.history') }}">Klubas</a>
                                            <ul class="sub-menu">
                                                <li class="@if(Route::currentRouteName() == 'club.history') active @endif">
                                                    <a href="{{ route('club.history') }}">Istorija</a></li>
                                                <li class="@if(Route::currentRouteName() == 'club.contacts') active @endif">
                                                    <a href="{{ route('club.contacts') }}">Kontaktai</a></li>
                                                <li class="@if(Route::currentRouteName() == 'club.administration') active @endif">
                                                    <a href="{{ route('club.administration') }}">Administracija</a></li>
                                                <li class="@if(Route::currentRouteName() == 'club.stadiums') active @endif">
                                                    <a href="{{ route('club.stadiums') }}">Stadionai</a></li>
                                            </ul>
                                        </li>
                                        <li class="@if(Route::currentRouteName() == 'attributes') current-menu-item current_page_item @endif">
                                            <a href="{{ route('attributes') }}">Atributika</a>
                                        </li>
                                        <li class="@if(Route::currentRouteName() == 'tickets') current-menu-item current_page_item @endif">
                                            <a href="{{ route('tickets') }}">Bilietai</a>
                                        </li>
                                        <li class="@if(Route::currentRouteName() == 'support') current-menu-item current_page_item @endif">
                                            <a href="{{ route('support') }}">Parama</a>
                                        </li>
                                        <li class="@if(Route::currentRouteName() == 'fans') current-menu-item current_page_item @endif">
                                            <a href="{{ route('fans') }}">Fanai</a>
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
    </header>
    <!--Header End-->
</div>
<!--Full width header End-->
