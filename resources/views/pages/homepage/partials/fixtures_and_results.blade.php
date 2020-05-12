<div class="h3-fixtures">
@for($i = 1; $i < 8; $i++)
    @if($i != 1 && $matches[$i-1]->is_fixture == true)
            <div class="next-match-fixtures light red-header">
              Praėjusios rungtynės
            </div>
    @endif
    <!--Box Start-->
        <div class="next-match-fixtures light">
            <ul class="match-teams-vs">
                <li class="team-logo"><img src="{{ $matches[$i]->homeTeam()->logoUrl() }}"> <strong>{{ $matches[$i]->homeTeam()->name }}</strong>
                </li>
                <li class="mvs">
                    <p>
                        <strong>{{ $matches[$i]->tournament->title }}</strong> {{ $matches[$i]->date }}
                        {{ date("H:i", strtotime($matches[$i]->time)) }} </p>
                    <strong class="vs">
                        @if($matches[$i]->is_fixture == true)
                            PRIEŠ
                        @else
                            {{ $matches[$i]->homeTeamScore() }}
                            : {{ $matches[$i]->awayTeamScore() }}
                        @endif
                    </strong></li>
                <li class="team-logo"><img src="{{ $matches[$i]->awayTeam()->logoUrl() }}">
                    <strong>{{ $matches[$i]->awayTeam()->name }}</strong></li>
            </ul>
            <ul class="nmf-loc">
                <li><i class="fas fa-location-arrow"></i>{{ str_limit($matches[$i]->location, 32) }}</li>
                <li><a href="{{ route('matches.show', ['id' => $matches[$i]->id, 'slug' => $matches[$i]->slug()]) }}"><i class="fas fa-info"></i>Plačiau</a></li>
            </ul>
        </div>
        <!--Box End-->
    @endfor
</div>
