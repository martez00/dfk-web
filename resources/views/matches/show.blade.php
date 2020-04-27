@extends('template')

@section('title') {{ $match->homeTeam()->name }} – {{ $match->awayTeam()->name }}@endsection

@section('content')
    <!-- About Section Start -->
    <div class="rs-about sec-bg pt-180 md-pt-160 pb-100 md-pb-80 md-pt-80">
        <div class="container">
            <div class="rs-tab pb-90 md-pb-60">
                <div class="club-details_data">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#events">Įvykiai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#players">Sudėtys</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="events">
                            <div class="match-events-wrapper animate-links our-team-home">
                                <div class="text-center lined-bottom">
                                    <div class="h5 text-primary font-weight-more">19:30</div>
                                    <div class="h5 font-weight-morer text-uppercase pb-2">
                                        <div class="liney"><span>Rungtynių pradžia</span></div>
                                    </div>
                                </div>
                                <div class="match-events">
                                    <div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/richlord-ennin/">Richlord Ennin</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/ball.svg" alt="Įvartis!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Įvartis!"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">9’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div><div class="match-event event-away">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">15’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-start align-items-center">
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg" alt="Keitimas" data-toggle="tooltip" data-placement="top" title="" data-original-title="Keitimas"></span>
                                                    <div class="d-flex flex-column ml-2 ml-lg-3">
                                                        <span>Šarūnas Jurevičius</span>
                                                        <span class="font-size-sm color-gray">Rafael Broetto Henrique</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/ivan-tatomirovic/">Ivan Tatomirovic</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg" alt="Geltona kortelė" data-toggle="tooltip" data-placement="top" title="" data-original-title="Geltona kortelė"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">17’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div><div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/david-ngog/">David Ngog</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/ball.svg" alt="Įvartis!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Įvartis!"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">25’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div>                            </div>
                                <div class="text-center lined-top lined-bottom">
                                    <div class="h5 font-weight-morer text-uppercase py-2">
                                        <div class="liney"><span>Pertrauka</span></div>
                                    </div>
                                </div>
                                <div class="match-events">
                                    <div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/karolis-uzela/">Karolis Uzėla</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg" alt="Geltona kortelė" data-toggle="tooltip" data-placement="top" title="" data-original-title="Geltona kortelė"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">48’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div><div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/mantas-kuklys/">Mantas Kuklys</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/ball.svg" alt="Įvartis!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Įvartis!"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">49’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div><div class="match-event event-away">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">49’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-start align-items-center">
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg" alt="Keitimas" data-toggle="tooltip" data-placement="top" title="" data-original-title="Keitimas"></span>
                                                    <div class="d-flex flex-column ml-2 ml-lg-3">
                                                        <span>Sebastian Vasquez Gamboa</span>
                                                        <span class="font-size-sm color-gray">Paulius Janušauskas</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="match-event event-away">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">54’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-start align-items-center">
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/red-card.svg" alt="Raudona kortelė" data-toggle="tooltip" data-placement="top" title="" data-original-title="Raudona kortelė"></span>
                                                    <div class="d-flex flex-column ml-2 ml-lg-3">
                                                        <span>Justinas Januševskij</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/higor-vidal/">Higor Felipe Vidal</a>
                                                        <a class="font-size-sm color-gray" href="https://fkzalgiris.lt/player/mantas-kuklys/">Mantas Kuklys</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg" alt="Keitimas" data-toggle="tooltip" data-placement="top" title="" data-original-title="Keitimas"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">60’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div><div class="match-event event-away">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">63’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-start align-items-center">
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg" alt="Geltona kortelė" data-toggle="tooltip" data-placement="top" title="" data-original-title="Geltona kortelė"></span>
                                                    <div class="d-flex flex-column ml-2 ml-lg-3">
                                                        <span>Matheus Bissi Da Silva</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/liviu-antal/">Liviu Ion Antal</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/ball.svg" alt="Įvartis!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Įvartis!"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">65’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div><div class="match-event event-away">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">69’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-start align-items-center">
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg" alt="Keitimas" data-toggle="tooltip" data-placement="top" title="" data-original-title="Keitimas"></span>
                                                    <div class="d-flex flex-column ml-2 ml-lg-3">
                                                        <span>Vytas Gašpuitis</span>
                                                        <span class="font-size-sm color-gray">Ernestas Veliulis</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/hugo-videmont/">Hugo Videmont</a>
                                                        <a class="font-size-sm color-gray" href="https://fkzalgiris.lt/player/karolis-uzela/">Karolis Uzėla</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg" alt="Keitimas" data-toggle="tooltip" data-placement="top" title="" data-original-title="Keitimas"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">70’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div><div class="match-event event-home">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                    <div class="d-flex flex-column mr-2 mr-lg-3">
                                                        <a href="https://fkzalgiris.lt/player/matas-vareika/">Matas Vareika</a>
                                                        <a class="font-size-sm color-gray" href="https://fkzalgiris.lt/player/richlord-ennin/">Richlord Ennin</a>
                                                    </div>
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg" alt="Keitimas" data-toggle="tooltip" data-placement="top" title="" data-original-title="Keitimas"></span>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">74’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                        </div>
                                    </div><div class="match-event event-away">
                                        <div class="row">
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                            </div>
                                            <div class="col-2 col-lg-1">
                                                <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                    <div class="h4 line-height-1 number-box">92’</div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-lg px-0 px-lg-3">
                                                <div class="d-flex h-100 justify-content-start align-items-center">
                                                    <span class="flex-shrink-0"><img class="img-fluid event-icon" src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg" alt="Geltona kortelė" data-toggle="tooltip" data-placement="top" title="" data-original-title="Geltona kortelė"></span>
                                                    <div class="d-flex flex-column ml-2 ml-lg-3">
                                                        <span>Rafael Da Silva Floro</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>            </div>
                                <div class="text-center lined-top">
                                    <div class="h5 font-weight-morer text-uppercase pt-2">
                                        <div class="liney"><span>Finalinis švilpukas</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="players">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 lg-mb-30">
                                    <div class="award-wrap">
                                        <div class="champion-logo">
                                            <img src="images/award/1.png" alt="Award">
                                        </div>
                                        <div class="champion-details">
                                            <div class="year-details">
                                                <h4 class="title mb-17">UEFA Champions League</h4>
                                                <span>2002 2008 2013 2017</span>
                                            </div>
                                            <div class="champion-no">5</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 lg-mb-30">
                                    <div class="award-wrap">
                                        <div class="champion-logo">
                                            <img src="images/award/2.png" alt="Award">
                                        </div>
                                        <div class="champion-details">
                                            <div class="year-details">
                                                <h4 class="title mb-17">UEFA Europa League</h4>
                                                <span>1971–72 1983–84 1985–86 1992–93 1994–95</span>
                                            </div>
                                            <div class="champion-no">7</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 sm-mb-30">
                                    <div class="award-wrap">
                                        <div class="champion-logo">
                                            <img src="images/award/3.png" alt="Award">
                                        </div>
                                        <div class="champion-details">
                                            <div class="year-details">
                                                <h4 class="title mb-17">UEFA Super Cup</h4>
                                                <span>1998 2000 2002 2007 2010 2013</span>
                                            </div>
                                            <div class="champion-no">6</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="award-wrap">
                                        <div class="champion-logo">
                                            <img src="images/award/4.png" alt="Award">
                                        </div>
                                        <div class="champion-details">
                                            <div class="year-details">
                                                <h4 class="title mb-17">FIFA Club World Cup</h4>
                                                <span>1998 2002 2014</span>
                                            </div>
                                            <div class="champion-no">3</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->
@endsection
