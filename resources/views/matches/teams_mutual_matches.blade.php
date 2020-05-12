@extends('template')

@section('title') {{ $firstTeam->name }} – {{ $secondTeam->name }} tarpusavio rungtynės @endsection

@section('content')
    @include('sections.page_header', ['title' => $firstTeam->name . ' - ' . $secondTeam->name . ' tarpusavio rungtynės'])
    <div class="wf100 p50-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="h3-fixtures">
                        @foreach($matches as $match)
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
                                            @if($match->is_fixture == true)
                                                PRIEŠ
                                            @else
                                                {{ $match->homeTeamScore() }}
                                                : {{ $match->awayTeamScore() }}
                                            @endif
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
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    {{ $matches->appends(request()->input())->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection
