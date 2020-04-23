@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
        </div>
        <div class="col-sm-12 col-md-9">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Rungtynės
                </div>
                <div class="card-body">
                    <div class="row data-header-row mt-0 mb-0">
                        <div class="col-md-12">
                            Naujų rungtynių sukūrimas
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 col-xs-12">
                            <label for="team">Komanda</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="team" name="team">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label for="season">Sezonas</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="season" name="season">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label for="tournament">Turnyras</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="tournament" name="tournament">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <label for="createMatchButton">&nbsp;</label>
                            <button type="submit" class="btn btn-sm btn-primary btn-block" id="createMatchButton">Sukurti rungtynes</button>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-td-vertical-middle">
                            <thead>
                            <tr>
                                <th scope="col">Komanda</th>
                                <th scope="col">Varžovas</th>
                                <th scope="col">Tipas</th>
                                <th scope="col">Rezultatas</th>
                                <th scope="col">Data</th>
                                <th scope="col">Sezonas</th>
                                <th scope="col">Turnyras</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($matches as $match)
                                <tr>
                                    <td>{{ $match->team->name }}</td>
                                    <td>{{ $match->opponentTeam->name }}</td>
                                    <td>{{ $match->type }}</td>
                                    <td>
                                        @if($type == 'home')
                                            {{ $match->team_score }} : {{ $match->opponent_team_score }}
                                        @else
                                            {{ $match->opponent_team_score }} : {{ $match->team_score }}
                                        @endif
                                    </td>
                                    <td>{{ $match->date }} {{ $match->time }}</td>
                                    <td>{{ $match->season->title }}</td>
                                    <td>{{ $match->tournament->title }}</td>
                                    <td></td>
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
                    {{ $matches->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection
