@extends('admin.template')

@section('content')
    <div class="card">
        <div class="card-header font-weight-bold">
            Pagrindiniai nustatymai
        </div>
        <form method="POST" action="{{ route('settings.update') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="main_team">Pagrindinė komanda</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="main_team" name="main_team">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}"
                                            @if($mainTeamSetting->value == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="current_season">Dabartinis sezonas</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="current_season" name="current_season">
                                @foreach($seasons as $season)
                                    <option value="{{ $season->id }}"
                                            @if($currentSeasonSetting->value == $season->id) selected @endif>{{ $season->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-success btn-block">Išsaugoti</button>
            </div>
        </form>
    </div>
@endsection
