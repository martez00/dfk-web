@extends('admin.template')

@php
    $formUrl = isset($team) ? route('teams.update', $team->id) : route('teams.store');
@endphp

@section('content')
    <div class="row">
        @include('admin.partials.statsLinks')
        <div class="col-sm-12 col-md-9">
            @if(isset($team))
                <a class="btn btn-sm btn-outline-primary mb-3" href="{{ route('teams.create') }}">Sukurti naują
                    komandą</a>
            @endif
            <div class="card">
                <div class="card-header font-weight-bold">
                    Komandos
                </div>
                <form method="POST" action="{{ $formUrl }}" enctype="multipart/form-data">
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
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="title">El. paštas</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                           value="{{ isset($team) ? $team->email : old('email') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="level">Tel. nr.</label>
                                    <input type="text" class="form-control form-control-sm" id="level"
                                           name="phone_number"
                                           value="{{ isset($team) ? $team->phone_number : old('phone_number') }}">
                                </div>
                            </div>
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