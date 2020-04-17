@extends('admin.template')

@php
    $formUrl = isset($season) ? route('seasons.update', $season->id) : route('seasons.store');
@endphp

@section('content')
    <div class="row">
        @include('admin.partials.statsLinks')
        <div class="col-sm-12 col-md-9">
            @if(isset($season))
                <a class="btn btn-outline-primary btn-sm mb-3" href="{{ route('seasons.create') }}">Sukurti naują sezoną</a>
            @endif
            <div class="card">
                <div class="card-header font-weight-bold">
                    Sezonai
                </div>
                <form method="POST" action="{{ $formUrl }}">
                    @isset($season)
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Sezono pavadinimas</label>
                                    <input type="text" class="form-control form-control-sm" id="title" name="title"
                                           value="{{ isset($season) ? $season->title : old('title') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="start_date">Data nuo</label>
                                    <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"
                                           data-date-format="YYYY-MM-DD"
                                           value="{{ isset($season) ? $season->start_date : old('start_date') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="end_date">Data iki</label>
                                    <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"
                                           data-date-format="YYYY-MM-DD"
                                           value="{{ isset($season) ? $season->end_date : old('end_date') }}">
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