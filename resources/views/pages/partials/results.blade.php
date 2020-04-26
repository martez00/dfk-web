@php
    $matches = \App\Match::where('team_id', mainTeamId())->orderBy('date', 'DESC')->finished()->take(10)->get();
@endphp
@if(count($matches))
    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
         data-autoplay-timeout="8000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false"
         data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
         data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false"
         data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
        @foreach($matches as $match)
            <div class="items">
                <a href="#">
                    <div class="vanues">
                        <div class="stadium">{{ $match->location }}</div>
                        <div class="date">{{ date("Y-m-d H:i", strtotime($match->date . ' ' . $match->time)) }}</div>
                    </div>
                    <div class="teams">
                        @if($match->type == 'home' || $match->type == 'neutral')
                            <div class="logo">
                                <img class="size-80" src="{{ $match->team->logoUrl() }}">
                                <div class="name">{{ $match->team->name }}</div>
                            </div>
                            <div class="score">{{ $match->team_score }} : {{ $match->opponent_team_score }}</div>
                            <div class="logo">
                                <img class="size-80" src="{{ $match->opponentTeam->logoUrl() }}">
                                <div class="name">{{ $match->opponentTeam->name }}</div>
                            </div>
                        @else
                            <div class="logo">
                                <img class="size-80" src="{{ $match->opponentTeam->logoUrl() }}">
                                <div class="name">{{ $match->opponentTeam->name }}</div>
                            </div>
                            <div class="score">{{ $match->opponent_team_score }} : {{ $match->team_score }}</div>
                            <div class="logo">
                                <img class="size-80" src="{{ $match->team->logoUrl() }}">
                                <div class="name">{{ $match->team->name }}</div>
                            </div>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif
