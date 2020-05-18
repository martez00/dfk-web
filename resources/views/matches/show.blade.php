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
                            <div class="col-lg-8 col-md-12"
                                 style="background: #fff; padding: 0; overflow: hidden; border-radius: 5px; border: 1px solid #e1e1e1; margin-bottom: 50px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="match-tabs-row" style="padding: 0; overflow: hidden;">
                                            <div class="row">
                                                <div class="col-md-6 match-tabs-col match-tabs-col-active"
                                                     onclick="setActiveTab(this, 'match-players-tab')">
                                                    Komandų sudėtys
                                                </div>
                                                <div class="col-md-6 match-tabs-col"
                                                     onclick="setActiveTab(this, 'match-events-tab')">
                                                    Rungtynių įvykiai
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row match-players-tab" style="padding: 10px;">
                                    <div class="col-lg-6">
                                        @include('matches.partials.match_players', ['team' => $match->homeTeam(), 'startingPlayers' => $homeTeamStartingPlayers, 'benchPlayers' => $homeTeamBenchPlayers])
                                    </div>
                                    <div class="col-lg-6">
                                        @include('matches.partials.match_players', ['team' => $match->awayTeam(), 'startingPlayers' => $awayTeamStartingPlayers, 'benchPlayers' => $awayTeamBenchPlayers])
                                    </div>
                                </div>
                                <div class="row match-events-tab d-none" style="padding: 10px;">
                                    <div class="col-lg-12">
                                        aaaaaa
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

@section('scripts')
    <script>
        function setActiveTab(element, tabName) {
            let otherTab = (tabName == 'match-players-tab' ? 'match-events-tab' : 'match-players-tab');
            $('.' + otherTab).addClass('d-none');
            $('.' + tabName).removeClass('d-none');
            $('.match-tabs-col-active').removeClass('match-tabs-col-active');
            $(element).addClass('match-tabs-col-active');
        }
    </script>
@endsection
