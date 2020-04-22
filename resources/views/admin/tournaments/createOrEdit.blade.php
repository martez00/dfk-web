@extends('admin.template')

@php
    $formUrl = isset($tournament) ? route('tournaments.update', $tournament->id) : route('tournaments.store');
@endphp

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
        </div>
        <div class="col-sm-12 col-md-9">
            @if(isset($tournament))
                <a class="btn btn-sm btn-outline-primary mb-3" href="{{ route('tournaments.create') }}">Sukurti naują
                    turnyrą</a>
            @endif
            <div class="card">
                <div class="card-header font-weight-bold">
                    Turnyras
                </div>
                <form method="POST" action="{{ $formUrl }}">
                    @isset($tournament)
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="title">Turnyro pavadinimas</label>
                                    <input type="text" class="form-control form-control-sm" id="title" name="title"
                                           value="{{ isset($tournament) ? $tournament->title : old('title') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="level">Lygmuo</label>
                                    <input type="number" class="form-control form-control-sm" id="level" name="level" min="1" max="5"
                                           value="{{ isset($tournament) ? $tournament->level : old('level') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="cup_tournament"
                                           name="cup_tournament" value="1"
                                           @if (isset($tournament) && $tournament->cup_tournament) checked @endif>
                                    <label class="form-check-label" for="cup_tournament">Taurės turnyras</label>
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
