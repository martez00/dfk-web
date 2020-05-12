<!--Header Start-->
<header id="main-header" class="main-header">
    <!--topbar-->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <ul class="topsocial">
                        <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="insta"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="yt"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="toplinks">
                        <li>
                            <a href="#">Ataskaitos</a>
                        </li>
                        <li style="margin-left: 10px;">
                            <a href="{{ route('support') }}">Parama</a>
                        </li>
                        <li style="margin-left: 10px; margin-right: 15px;">
                            <a href="{{ route('club.contacts') }}">Kontaktai</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--topbar end-->
    <!--Logo + Navbar Start-->
    <div class="logo-navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-5">
                    <div class="logo"><a href="{{ route('homepage') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="logo">
                        </a></div>
                </div>
                <div class="col-md-10 col-sm-7">
                    <nav class="main-nav">
                        <ul>
                            <li class="nav-item">
                                <a href="{{ route('homepage') }}">Pagrindinis</a>
                            </li>
                            <li class="nav-item drop-down">  <a href="{{ route('club.history') }}">Klubas</a>
                                <ul>
                                    <li><a href="{{ route('club.history') }}">Istorija</a></li>
                                    <li><a href="{{ route('club.contacts') }}">Kontaktai</a></li>
                                    <li><a href="{{ route('club.administration') }}">Administracija</a></li>
                                    <li><a href="{{ route('club.stadiums') }}">Stadionai</a></li>
                                    <li><a href="{{ route('fans') }}">Fanai</a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-down">  <a href="#">Komanda</a>
                                <ul>
                                    <li><a href="#">Žaidėjai</a></li>
                                    <li><a href="#">Personalas</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#">Rungtynės</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('attributes') }}">Atributika</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tickets') }}">Bilietai</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--Logo + Navbar End-->
</header>
<!--Header End-->
