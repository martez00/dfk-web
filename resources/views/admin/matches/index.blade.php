@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
            <div class="card mt-3">
                <div class="card-header font-weight-bold">
                    Rungtynių paieška
                </div>
                <form action="{{ route('matches.index') }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="team-search">Komanda</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="team-search" name="team">
                                <option value="" selected>...</option>
                                @foreach($allTeams as $team)
                                    <option value="{{ $team->id }}"
                                            @if(Request::input('team') == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type-search">Tipas</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="type-search" name="type">
                                <option value="" selected>...</option>
                                <option value="home" @if(Request::input('type') == 'home') selected @endif>Namų rungtynės</option>
                                <option value="away" @if(Request::input('type') == 'away') selected @endif>Išvykos rungtynės</option>
                                <option value="neutral" @if(Request::input('type') == 'neutral') selected @endif>Neutrali aikštė</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="season-search">Sezonas</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="season-search" name="season">
                                <option value="" selected>...</option>
                                @foreach($seasons as $season)
                                    <option value="{{ $season->id }}"
                                            @if(Request::input('season') == $season->id) selected @endif>{{ $season->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tournament-search">Turnyras</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="tournament-search" name="tournament">
                                <option value="" selected>...</option>
                                @foreach($tournaments as $tournament)
                                    <option value="{{ $tournament->id }}"
                                            @if(Request::input('tournament') == $tournament->id) selected @endif>{{ $tournament->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="player-search">Žaidėjas</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="player-search" name="player">
                                <option value="" selected>...</option>
                                @foreach($players as $player)
                                    <option value="{{ $player->id }}"
                                            @if(Request::input('player') == $player->id) selected @endif>{{ $player->name . ' ' . $player->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="finished"
                                   name="finished" value="1"
                                   @if (Request::input('finished')) checked @endif>
                            <label class="form-check-label" for="finished">Pasibaigusios rungtynės</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm btn-block">Vykdyti paiešką</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Naujų rungtynių sukūrimas
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="team">Komanda</label>
                                <select class="single-select-with-typing form-control form-control-sm" id="team"
                                        name="team">
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="season">Sezonas</label>
                                <select class="single-select-with-typing form-control form-control-sm"
                                        id="season"
                                        name="season">
                                    @foreach($seasons as $season)
                                        <option value="{{ $season->id }}">{{ $season->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tournament">Turnyras</label>
                                <select class="single-select-with-typing form-control form-control-sm"
                                        id="tournament"
                                        name="tournament">
                                    @foreach($tournaments as $tournament)
                                        <option value="{{ $tournament->id }}">{{ $tournament->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="createMatchButton">&nbsp;</label>
                                <button class="btn btn-sm btn-primary btn-block"
                                        id="createMatchButton">
                                    Sukurti rungtynes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header font-weight-bold">
                    Rungtynės
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-td-vertical-middle">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Data</th>
                                <th scope="col">Sezonas</th>
                                <th scope="col">Turnyras</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($matches as $match)
                                <tr style="background-color: @if($match->matchResultType() == 'won') #8fdb91 @elseif($match->matchResultType() == 'draw') #d6c68d @elseif($match->matchResultType() == 'lost') #db6b6b @else white @endif">
                                    <td align="center">{!!  $match->type == 'home' || $match->type == 'neutral' ? '<b>'.$match->team->name.'</b>' : $match->opponentTeam->name !!}</td>
                                    <td nowrap align="center">{{ $match->type == 'home' || $match->type == 'neutral' ? $match->team_score : $match->opponent_team_score }}
                                        : {{ $match->type == 'home' || $match->type == 'neutral' ? $match->opponent_team_score : $match->team_score }}</td>
                                    <td align="center">{!! $match->type == 'home' || $match->type == 'neutral' ? $match->opponentTeam->name : '<b>'.$match->team->name.'</b>'  !!}</td>
                                    <td>{{ $match->date }} {{ date('H:i', strtotime($match->time)) }}</td>
                                    <td>{{ $match->season->title }}</td>
                                    <td>{{ $match->tournament->title }}</td>
                                    <td class="text-right"><a class="btn btn-sm btn-warning"
                                                              href="{{ route('matches.edit', $match->id) }}">Redaguoti</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="alert alert-warning" style="margin-bottom: 0;">
                                            Nepavyko rasti nei vieno įrašo.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $matches->appends(request()->input())->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#createMatchButton').on('click', function () {
            var team = $('#team :selected').val();
            var season = $('#season :selected').val();
            var tournament = $('#tournament :selected').val();

            var url = '{{ route('matches.create', ['team_id' => ':team_id', 'season_id' => ':season_id', 'tournament_id' => ':tournament_id']) }}';
            url = url.replace(':team_id', team);
            url = url.replace(':season_id', season);
            url = url.replace(':tournament_id', tournament);
            window.location.href = url;
        });
    </script>
@endsection
