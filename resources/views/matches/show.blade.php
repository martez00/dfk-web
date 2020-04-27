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
                            @if($firstHalfEvents || $secondHalfEvents)
                                <div class="row match-divider">
                                    <div class="col-md-12 text-center">
                                        Rungtynių pradžia
                                    </div>
                                </div>
                                @if($firstHalfEvents)
                                    @foreach($firstHalfEvents as $event)
                                        <div class="row">
                                            <div class="col-md-5">

                                            </div>
                                            <div class="col-md-2 text-center">
                                                <span style="background-color: red; color: white; font-weight: bold; padding: 5px; font-size: 20px;">{{ $event->minute }}'</span>
                                            </div>
                                            <div class="col-md-5">

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row match-divider">
                                    <div class="col-md-12 text-center">
                                        Pertrauka
                                    </div>
                                </div>
                                @if($secondHalfEvents)
                                    @foreach($secondHalfEvents as $event)
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {{ $event->player->name }} {{ $event->player->surname }}
                                            </div>
                                            <div class="col-sm-2">
                                                {{ $event->type }}
                                            </div>
                                            <div class="col-sm-2">
                                                {{ $event->minute }}
                                            </div>
                                            <div class="col-sm-2">
                                                {{ $event->team->name }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row match-divider">
                                    <div class="col-md-12 text-center">
                                        Rungtynių pabaiga
                                    </div>
                                </div>
                            @else
                                Nėra informacijos.
                            @endif
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
