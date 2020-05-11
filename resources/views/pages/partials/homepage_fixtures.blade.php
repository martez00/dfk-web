<!--Next Match start-->
<div class="h3-next-match wf100 mt-m90 pb20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
            @if($firstBlockMatches[0]->is_fixture == true)
                <!--Last Match Result Start-->
                    <div class="next-match-box">
                        <h4>Artimiausios rungtynės</h4>
                        <div class="nms-box">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="team-logo-left">
                                        <strong>{{ $firstBlockMatches[0]->homeTeam()->name }}</strong> <img
                                                src="{{ $firstBlockMatches[0]->homeTeam()->logoUrl() }}"
                                                alt=""></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="nms-info"><strong class="vs">PRIEŠ</strong>
                                        <p><strong>{{ $firstBlockMatches[0]->tournament->title }}</strong></p>
                                        <p>{{ $firstBlockMatches[0]->date }}
                                            | {{ date("H:i", strtotime($firstBlockMatches[0]->time)) }}</p>
                                        <p><span>{{ $firstBlockMatches[0]->location }}</span></p>
                                        <a href="#">PLAČIAU</a></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="team-logo-right"><img
                                                src="{{ $firstBlockMatches[0]->awayTeam()->logoUrl() }}" alt="">
                                        <strong>{{ $firstBlockMatches[0]->awayTeam()->name }}</strong></div>
                                </div>
                            </div>
                            <div class="defaultCountdown"
                                 match-date="{{ $firstBlockMatches[0]->date }} {{ $firstBlockMatches[0]->time }}"></div>
                        </div>
                        <!--Last Match Result End-->
                    </div>
            @else
                <!--Last Match Result Start-->
                    <div class="next-match-box">
                        <h4>Artimiausios rungtynės nėra suplanuotos</h4>
                        <div class="nms-box">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="team-logo-left">
                                        <strong>{{ $firstBlockMatches[0]->homeTeam()->name }}</strong> <img
                                                src="{{ $firstBlockMatches[0]->homeTeam()->logoUrl() }}"
                                                alt=""></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="nms-info"><strong class="vs">PRIEŠ</strong>
                                        <p><strong>{{ $firstBlockMatches[0]->tournament->title }}</strong></p>
                                        <p>{{ $firstBlockMatches[0]->date }} | {{ $firstBlockMatches[0]->time }}</p>
                                        <p><span>{{ $firstBlockMatches[0]->location }}</span></p>
                                        <a href="#">Plačiau</a></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="team-logo-right"><img
                                                src="{{ $firstBlockMatches[0]->awayTeam()->logoUrl() }}" alt="">
                                        <strong>{{ $firstBlockMatches[0]->awayTeam()->name }}</strong></div>
                                </div>
                            </div>
                            <div class="defaultCountdown"></div>
                        </div>
                    </div>
                    <!--Last Match Result End-->
                @endif

            </div>
            <div class="col-lg-4 col-md-5">
                <div class="h3-fixtures">
                @for($i = 1; $i <= 2; $i++)
                    <!--Box Start-->
                        <div class="next-match-fixtures light">
                            <ul class="match-teams-vs">
                                <li class="team-logo"><img src="{{ $firstBlockMatches[$i]->homeTeam()->logoUrl() }}"
                                                           alt=""> <strong>FC
                                        Champs</strong>
                                </li>
                                <li class="mvs">
                                    <p>
                                        <strong>{{ $firstBlockMatches[$i]->tournament->title }}</strong> {{ $firstBlockMatches[$i]->date }}
                                        {{ $firstBlockMatches[$i]->time }} </p>
                                    <strong class="vs">
                                        @if($firstBlockMatches[$i]->is_fixture == true)
                                            PRIEŠ
                                        @else
                                            {{ $firstBlockMatches[$i]->homeTeamScore() }}
                                            : {{ $firstBlockMatches[$i]->awayTeamScore() }}
                                        @endif
                                    </strong></li>
                                <li class="team-logo"><img src="{{ $firstBlockMatches[$i]->awayTeam()->logoUrl() }}"
                                                           alt="">
                                    <strong>Tigers</strong></li>
                            </ul>
                            <ul class="nmf-loc">
                                <li><i class="fas fa-location-arrow"></i>{{ $firstBlockMatches[$i]->location }}</li>
                                <li><a href="#"><i class="fas fa-info"></i>Plačiau</a></li>
                            </ul>
                        </div>
                        <!--Box End-->
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
<!--Next Match End-->
