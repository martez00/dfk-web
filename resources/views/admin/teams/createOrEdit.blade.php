@extends('admin.template')

@php
    $formUrl = isset($team) ? route('teams.update', $team->id) : route('teams.store');
@endphp

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
        </div>
        <div class="col-sm-12 col-md-9">
            @if(isset($team))
                <a class="btn btn-sm btn-outline-primary mb-3" href="{{ route('teams.create') }}">Sukurti naują
                    komandą</a>
            @endif
            <form method="POST" action="{{ $formUrl }}" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Komanda
                    </div>
                    @isset($team)
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
                                    <label for="name">Pavadinimas</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name"
                                           value="{{ isset($team) ? $team->name : old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="short_name">Sutrumpinimas</label>
                                    <input type="text" class="form-control form-control-sm" id="short_name"
                                           name="short_name"
                                           value="{{ isset($team) ? $team->short_name : old('short_name') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="logo">Logotipas</label>
                                    <input type="file" id="logo" name="logo">
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                <div class="form-group">
                                    @if(isset($team))
                                        <img src="{{ $team->logoUrl() }}" style="height: 50px;">
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
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="country">Šalis</label>
                                    <input type="text" class="form-control form-control-sm" id="country" name="country"
                                           value="{{ isset($team) ? $team->country : old('country') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="city">Miestas</label>
                                    <input type="text" class="form-control form-control-sm" id="city" name="city"
                                           value="{{ isset($team) ? $team->city : old('city') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="address">Adresas</label>
                                    <input type="text" class="form-control form-control-sm" id="address" name="address"
                                           value="{{ isset($team) ? $team->address : old('address') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row data-header-row">
                            <div class="col-md-12">
                                Kontaktinė informacija
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="email">El. paštas</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                           value="{{ isset($team) ? $team->email : old('email') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="phone_number">Tel. nr.</label>
                                    <input type="text" class="form-control form-control-sm" id="phone_number"
                                           name="phone_number"
                                           value="{{ isset($team) ? $team->phone_number : old('phone_number') }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="website">Tinklalapis</label>
                                    <input type="text" class="form-control form-control-sm" id="website"
                                           name="website"
                                           value="{{ isset($team) ? $team->website : old('website') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-success btn-block">Išsaugoti</button>
                    </div>
                </div>
                @if(isset($team))
                    <div class="row">
                        <div class="col-md-6  col-xs-12 mt-3">
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    Komandos priklausančios šiai komandai
                                </div>
                                <div class="card-body">
                                    <ul class="last-li-no-margin">
                                        @forelse($team->relatedTeams as $relatedTeam)
                                            <li>
                                                <a href="{{ route('teams.edit', $relatedTeam->id) }}">{{ $relatedTeam->name }}</a>
                                            </li>
                                        @empty
                                            <li>
                                                Nėra įvesta šiai komandai priklausančių komandų.
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-xs-12 mt-3">
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    Komanda, kuriai priklauso ši komanda
                                </div>
                                <div class="card-body">
                                    <select class="single-select-with-typing form-control form-control-sm"
                                            id="related_team_id" name="related_team_id">
                                        <option value="" selected>...</option>
                                        @foreach($teams as $tmpTeam)
                                            <option value="{{ $tmpTeam->id }}"
                                                    @if($team->belongsToTeam && $team->belongsToTeam->id == $tmpTeam->id) selected @endif>{{ $tmpTeam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            @endif
        </div>
    </div>
@endsection
