@extends('admin.template')

@php
    $formUrl = isset($player) ? route('players.update', $player->id) : route('players.store');
@endphp

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
        </div>
        <div class="col-sm-12 col-md-9">
            @if(isset($player))
                <a class="btn btn-sm btn-outline-primary mb-3" href="{{ route('players.create') }}">Sukurti naują
                    žaidėją</a>
            @endif
            <div class="card">
                <div class="card-header font-weight-bold">
                    Žaidėjas
                </div>
                <form method="POST" action="{{ $formUrl }}" enctype="multipart/form-data">
                    @isset($player)
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">
                        <div class="row data-header-row">
                            <div class="col-md-12">
                                Pagrindinė informacija
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="name">Vardas</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name"
                                           value="{{ isset($player) ? $player->name : old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="surname">Pavardė</label>
                                    <input type="text" class="form-control form-control-sm" id="surname"
                                           name="surname"
                                           value="{{ isset($player) ? $player->surname : old('surname') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="logo">Nuotrauka</label>
                                    <input type="file" id="photo" name="photo">
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                <div class="form-group">
                                    @if(isset($player))
                                        <img src="{{ $player->photoUrl() }}" style="height: 50px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row data-header-row">
                            <div class="col-md-12">
                                Papildoma informacija
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="position">Pozicija</label>
                                    <select class="form-control form-control-sm" id="position" name="position">
                                        <option value="" selected>...</option>
                                        <option value="goalkeeper" @if(isset($player) && $player->position == 'goalkeeper') selected @endif>Vartininkas</option>
                                        <option value="defender" @if(isset($player) && $player->position == 'defender') selected @endif>Gynėjas</option>
                                        <option value="midfielder" @if(isset($player) && $player->position == 'midfielder') selected @endif>Saugas</option>
                                        <option value="striker" @if(isset($player) && $player->position == 'striker') selected @endif>Puolėjas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="country">Šalis</label>
                                    <input type="text" class="form-control form-control-sm" id="country" name="country"
                                           value="{{ isset($player) ? $player->country : old('country') }}">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="birth_date">Gimimo data</label>
                                    <input type="date" class="form-control form-control-sm" id="birth_date" name="birth_date"
                                           value="{{ isset($player) ? $player->birth_date : old('birth_date') }}">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="height">Ūgis</label>
                                    <input type="text" class="form-control form-control-sm" id="height" name="height"
                                           value="{{ isset($player) ? $player->height : old('height') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row data-header-row">
                            <div class="col-md-12">
                                Žaidėjo atstovavimas komandoms sezonų metu
                            </div>
                        </div>
                        <div class="row mt-3">
                            @foreach($teams as $team)
                                <input type="hidden" name="teams[]" value="{{ $team->id }}">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b><a href="{{ route('teams.edit', $team->id) }}">{{ $team->name }}</a></b>
                                    </div>
                                    @foreach($seasons as $season)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="seasons_teams_{{ $team->id . $season->id }}"
                                                   name="seasons_teams[{{ $team->id }}][{{ $season->id }}]" value="1"
                                                   @if (isset($assignedSeasonsTeams[$team->id]) && in_array($season->id, $assignedSeasonsTeams[$team->id])) checked @endif>
                                            <label class="form-check-label"
                                                   for="seasons_teams_{{ $team->id . $season->id }}">{{ $season->title }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-success btn-block">Išsaugoti</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
