@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
        </div>
        <div class="col-sm-12 col-md-9">
            <form method="POST" action="{{ route('matches.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Rungtynių kūrimas - pagrindinė informacija
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="team">Komanda</label>
                                    <input type="text" class="form-control form-control-sm" id="team" name="team"
                                           value="{{ isset($team) ? $team->name : old('team') }}" readonly>
                                    <input type="hidden" name="team_id"
                                           value="{{isset($team) ? $team->id : old('team_id') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="season">Sezonas</label>
                                    <input type="text" class="form-control form-control-sm" id="season" name="season"
                                           value="{{ isset($season) ? $season->title : old('season') }}" readonly>
                                    <input type="hidden" name="season_id"
                                           value="{{ isset($season) ? $season->id : old('season_id') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tournament">Turnyras</label>
                                    <input type="text" class="form-control form-control-sm" id="tournament" name="tournament"
                                           value="{{ isset($tournament) ? $tournament->title : old('tournament') }}"
                                           readonly>
                                    <input type="hidden" name="tournament_id"
                                           value="{{ isset($tournament) ? $tournament->id : old('tournament_id') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header font-weight-bold">
                        Rungtynių informacija
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="opponent_team_id">Varžovas</label>
                                    <select class="single-select-with-typing form-control form-control-sm" id="opponent_team_id"
                                            name="opponent_team_id">
                                        <option value="" selected>...</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}" @if(old('opponent_team_id') == $team->id) selected @endif>{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Tipas</label>
                                    <select class="single-select-with-typing form-control form-control-sm" id="type"
                                            name="type">
                                        <option value="" selected>...</option>
                                        <option value="home" @if(old('type') == 'home') selected @endif>Namų rungtynės</option>
                                        <option value="away" @if(old('type') == 'away') selected @endif>Išykos rungtynės</option>
                                        <option value="neutral" @if(old('type') == 'neutral') selected @endif>Neutrali aikštė</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="opponent_team_score">Varžovo įvarčių sk.</label>
                                    <input type="number" class="form-control form-control-sm" name="opponent_team_score" value="{{ old('opponent_team_score') }}" id="opponent_team_score" min="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="team_score">Jūsų įvarčių sk.</label>
                                    <input type="number" class="form-control form-control-sm" name="team_score" id="team_score" value="{{ old('team_score') }}" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date">Data</label>
                                    <input type="text" class="form-control form-control-sm" name="date" value="{{  old('date') }}" id="date">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="time">Laikas</label>
                                    <input type="text" class="form-control form-control-sm" name="time" value="{{  old('time') }}" id="time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="attendance">Lankomumas</label>
                                    <input type="number" class="form-control form-control-sm" name="attendance" id="attendance" value="{{ old('attendance') }}" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="location">Stadionas</label>
                                    <input type="text" class="form-control form-control-sm" name="location" id="location" value="{{ old('location') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="finished"
                                           name="finished" @if(old('finished')) checked @endif value="1">
                                    <label class="form-check-label" for="finished">Rungtynės pasibaigę</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-success btn-block">Išsaugoti</button>
                    </div>
                </div>
                <div class="alert alert-info mt-3 mb-0">
                    Sukūrę rungtynes galėsite įvesti rungtynių protokolą.
                </div>
            </form>
        </div>
    </div>
@endsection
