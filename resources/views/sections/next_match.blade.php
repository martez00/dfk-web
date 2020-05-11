@php
   $nextMatch = App\Match::with(['team', 'opponentTeam', 'season', 'tournament'])->notStarted()->mainTeamMatches()->orderBy('date', 'ASC')->first();
@endphp

@if($nextMatch)
    <!-- Match Counter Start -->
    <div class="h3-match-counter blue-bg ">
        <button class="hide"><i class="fas fa-times"></i></button>
        <div class="container">
            <div class="row">
                <ul>
                    <li class="col-md-2">
                        <div class="team-left"><img src="{{ $nextMatch->homeTeam()->logoUrl() }}" alt=""> <strong>{{ $nextMatch->homeTeam()->name }}</strong></div>
                    </li>
                    <li class="col-md-2">
                        <p class="mdate-time"> {{ $nextMatch->date }} <strong>{{ date("H:i", strtotime($nextMatch->time)) }}</strong> </p>
                    </li>
                    <li class="col-md-4">
                        <div class="defaultCountdown" match-date="{{ $firstBlockMatches[0]->date }} {{ $firstBlockMatches[0]->time }}"></div>
                    </li>
                    <li class="col-md-2">
                        <p class="match-loc"><i class="fas fa-location-arrow"></i> {{ $nextMatch->location }}</p>
                    </li>
                    <li class="col-md-2">
                        <div class="team-right"><img src="{{ $nextMatch->awayTeam()->logoUrl() }}" alt=""> <strong>{{ $nextMatch->awayTeam()->name }}</strong></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Match Counter Start -->
@endif
