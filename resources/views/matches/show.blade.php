@extends('template')

@section('title') {{ $match->homeTeam()->name }} – {{ $match->awayTeam()->name }}@endsection

@section('content')
    <div class="match-header wf100 blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5>{{ $match->season->title }}</h5>
                    <p>{{ $match->tournament->title }}</p>
                    <ul class="teamz">
                        <li class="mt-left"><img src="{{ $match->homeTeam()->logoUrl() }}">
                            <strong>{{ $match->homeTeam()->name }}</strong></li>
                        <li class="mt-center-score">
                            <div class="score-left"><span>{{ $match->homeTeamScore() }}</span></div>
                            <div class="score-right"><span>{{ $match->awayTeamScore() }}</span></div>
                        </li>
                        <li class="mt-right"><img src="{{ $match->awayTeam()->logoUrl() }}">
                            <strong>{{ $match->awayTeam()->name }}</strong></li>
                    </ul>
                    <ul class="match-score">
                        <div class="match-events-wrapper">
                            <div class="text-center lined-top">
                                <div class="h5 font-weight-morer text-uppercase pt-2">
                                    <div class="liney"><span>Finalinis švilpukas</span></div>
                                </div>
                            </div>
                            <div class="match-events">
                                <div class="match-event event-home">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                <div class="d-flex flex-column mr-2 mr-lg-3">
                                                    <span>Mihret Topcagic</span>
                                                </div>
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">27’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">34’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/nemanja-ljubisavljevic/">Nemanja
                                                        Ljubisavljevic</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-home">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                <div class="d-flex flex-column mr-2 mr-lg-3">
                                                    <span>Josip Tadic</span>
                                                </div>
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">34’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">40’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/mantas-kuklys/">Mantas
                                                        Kuklys</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center lined-top lined-bottom">
                                <div class="h5 font-weight-morer text-uppercase py-2">
                                    <div class="liney"><span>Pertrauka</span></div>
                                </div>
                            </div>
                            <div class="match-events">
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">59’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg"
                                                                                 alt="Keitimas" data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Keitimas"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/richlord-ennin/">Richlord
                                                        Ennin</a>
                                                    <a class="font-size-sm color-gray"
                                                       href="https://fkzalgiris.lt/player/marko-karamarko/">Marko
                                                        Karamarko</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">70’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/donovan-slijngard/">Donovan
                                                        Carlos Saverio Slijngard</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">74’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/modestas-vorobjovas/">Modestas
                                                        Vorobjovas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-home">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                <div class="d-flex flex-column mr-2 mr-lg-3">
                                                    <span>Domagoj Pušic</span>
                                                </div>
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">78’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-home">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                <div class="d-flex flex-column mr-2 mr-lg-3">
                                                    <span>Eligijus Jankauskas</span>
                                                    <span class="font-size-sm color-gray">Mihret Topcagic</span>
                                                </div>
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg"
                                                                                 alt="Keitimas" data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Keitimas"></span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">79’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-home">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                <div class="d-flex flex-column mr-2 mr-lg-3">
                                                    <span>Daniel Offenbacher</span>
                                                    <span class="font-size-sm color-gray">Povilas Leimonas</span>
                                                </div>
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg"
                                                                                 alt="Keitimas" data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Keitimas"></span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">79’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">81’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg"
                                                                                 alt="Keitimas" data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Keitimas"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/matas-vareika/">Matas
                                                        Vareika</a>
                                                    <a class="font-size-sm color-gray"
                                                       href="https://fkzalgiris.lt/player/david-ngog/">David Ngog</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-home">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                <div class="d-flex flex-column mr-2 mr-lg-3">
                                                    <span>Semir Kerla</span>
                                                </div>
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">83’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-home">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-end align-items-center text-right">
                                                <div class="d-flex flex-column mr-2 mr-lg-3">
                                                    <span>Giedrius Matulevičius</span>
                                                    <span class="font-size-sm color-gray">Renan Henrique Oliveira Vieira</span>
                                                </div>
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg"
                                                                                 alt="Keitimas" data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Keitimas"></span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">85’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">85’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg"
                                                                                 alt="Keitimas" data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Keitimas"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/domantas-simkus/">Domantas
                                                        Šimkus</a>
                                                    <a class="font-size-sm color-gray"
                                                       href="https://fkzalgiris.lt/player/modestas-vorobjovas/">Modestas
                                                        Vorobjovas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">88’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/ball.svg"
                                                                                 alt="Įvartis!" data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Įvartis!"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/mantas-kuklys/">Mantas
                                                        Kuklys</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">93’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/substitute.svg"
                                                                                 alt="Keitimas" data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Keitimas"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/gustas-jarusevicius/">Gustas
                                                        Jarusevičius</a>
                                                    <a class="font-size-sm color-gray"
                                                       href="https://fkzalgiris.lt/player/liviu-antal/">Liviu Ion
                                                        Antal</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="match-event event-away">
                                    <div class="row">
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                        </div>
                                        <div class="col-2 col-lg-1">
                                            <div class="d-flex h-100 align-items-center justify-content-center font-size-md font-weight-bold">
                                                <div class="h4 line-height-1 number-box">94’</div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-lg px-0 px-lg-3">
                                            <div class="d-flex h-100 justify-content-start align-items-center">
                                                <span class="flex-shrink-0"><img class="img-fluid event-icon"
                                                                                 src="https://fkzalgiris.lt/wp-content/themes/fkzalgiris/images/icons/yellow-card.svg"
                                                                                 alt="Geltona kortelė"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top" title=""
                                                                                 data-original-title="Geltona kortelė"></span>
                                                <div class="d-flex flex-column ml-2 ml-lg-3">
                                                    <a href="https://fkzalgiris.lt/player/martin-berkovec/">Martin
                                                        Berkovec</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center lined-top">
                                <div class="h5 font-weight-morer text-uppercase pt-2">
                                    <div class="liney"><span>Finalinis švilpukas</span></div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="m-date-loc">
            <li><i class="fas fa-calendar-alt"></i> {{ $match->date }} {{ date("H:i", strtotime($match->time)) }}</li>
            <li class="pipeline"> |</li>
            <li><i class="fas fa-map-marker-alt"></i> {{ $match->location }}</li>
        </ul>
    </div>
    <div class="wf100 p50 pb0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="match-players">
                        <div class="row">
                            <div class="col-lg-8 col-md-12" style="background: #fff; padding: 0; overflow: hidden; border-radius: 5px; border: 1px solid rgba(128,128,128,0.46);">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="match-tabs-row" style="padding: 0; overflow: hidden;">
                                            <div class="row">
                                                <div class="col-md-6 match-tabs-col match-tabs-col-active">
                                                    Komandų sudėtys
                                                </div>
                                                <div class="col-md-6 match-tabs-col">
                                                    Rungtynių įvykiai
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px;">
                                    <div class="col-lg-6">
                                        @include('matches.partials.match_players', ['team' => $match->homeTeam(), 'startingPlayers' => $homeTeamStartingPlayers, 'benchPlayers' => $homeTeamBenchPlayers])
                                    </div>
                                    <div class="col-lg-6">
                                        @include('matches.partials.match_players', ['team' => $match->awayTeam(), 'startingPlayers' => $awayTeamStartingPlayers, 'benchPlayers' => $awayTeamBenchPlayers])
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="h3-fixtures">
                                    <div class="next-match-fixtures light red-header-match">
                                        Įvykę tarpusavio rungtynės
                                    </div>
                                    @foreach($otherTeamsMatches as $match)
                                        <div class="next-match-fixtures light">
                                            <ul class="match-teams-vs">
                                                <li class="team-logo"><img src="{{ $match->homeTeam()->logoUrl() }}">
                                                    <strong>{{ $match->homeTeam()->name }}</strong>
                                                </li>
                                                <li class="mvs">
                                                    <p>
                                                        <strong>{{ $match->tournament->title }}</strong> {{ $match->date }}
                                                        {{ date("H:i", strtotime($match->time)) }} </p>
                                                    <strong class="vs">
                                                        {{ $match->homeTeamScore() }}
                                                        : {{ $match->awayTeamScore() }}
                                                    </strong></li>
                                                <li class="team-logo"><img src="{{ $match->awayTeam()->logoUrl() }}">
                                                    <strong>{{ $match->awayTeam()->name }}</strong></li>
                                            </ul>
                                            <ul class="nmf-loc">
                                                <li>
                                                    <i class="fas fa-location-arrow"></i>{{ str_limit($match->location, 32) }}
                                                </li>
                                                <li>
                                                    <a href="{{ route('matches.show', ['id' => $match->id, 'slug' => $match->slug()]) }}"><i
                                                                class="fas fa-info"></i>Plačiau</a></li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row buy-ticket" style="margin-top: 20px; margin-bottom: 50px;">
                                    <div class="col-md-12">
                                        <a href="{{ route('matches.teams_mutual_matches', ['first_team_id' => $match->team_id, 'second_team_id' => $match->opponent_team_id, 'slug' => $match->slug()]) }}"
                                           style="width: 100%;">Visos tarpusavio rungtynės</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
