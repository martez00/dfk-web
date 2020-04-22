@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
            <div class="card mt-3">
                <div class="card-header font-weight-bold">
                    Sezonų paieška
                </div>
                <form action="{{ route('seasons.index') }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Pavadinimas</label>
                            <input type="text" class="form-control form-control-sm" id="title" name="title"
                                   value="{{ Request::input('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="date_from">Data nuo</label>
                            <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"
                                   value="{{ Request::input('start_date') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="date_to">Data iki</label>
                            <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"
                                   value="{{ Request::input('end_date') }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm btn-block">Vykdyti paiešką</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
            <div class="card mb-3">
                <form method="POST" action="{{ route('seasons.update', $currentSeason->id) }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-header font-weight-bold">
                        Dabartinis sezonas
                    </div>
                    <div class="card-body">
                        <div class="row data-header-row">
                            <div class="col-md-12">
                                Pagrindinė informacija
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Sezono pavadinimas</label>
                                    <input type="text" class="form-control form-control-sm" id="title" name="title"
                                           value="{{ $currentSeason->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="start_date">Data nuo</label>
                                    <input type="date" class="form-control form-control-sm" id="start_date"
                                           name="start_date"
                                           data-date-format="YYYY-MM-DD"
                                           value="{{ $currentSeason->start_date }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="end_date">Data iki</label>
                                    <input type="date" class="form-control form-control-sm" id="end_date"
                                           name="end_date"
                                           data-date-format="YYYY-MM-DD"
                                           value="{{ $currentSeason->end_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="row data-header-row">
                            <div class="col-md-12">
                                Turnyrai
                            </div>
                        </div>
                        <div class="row">
                            @foreach($teams as $team)
                                <input type="hidden" name="teams[]" value="{{ $team->id }}">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <b><a href="{{ route('teams.edit', $team->id) }}">{{ $team->name }}</a></b>
                                    </div>
                                    @foreach($tournaments as $tournament)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="season_tournaments"
                                                   name="season_tournaments[{{ $team->id }}][{{ $tournament->id }}]"
                                                   value="1"
                                                   @if (isset($assignedTournamentsToTeams[$team->id]) && in_array($tournament->id, $assignedTournamentsToTeams[$team->id])) checked @endif>
                                            <label class="form-check-label"
                                                   for="season_tournaments">{{ $tournament->title }}</label>
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
            <div class="card">
                <div class="card-header font-weight-bold">
                    Kiti sezonai
                </div>
                <div class="card-body">
                    <a class="btn btn-outline-primary btn-sm mb-3" href="{{ route('seasons.create') }}">Sukurti naują
                        sezoną</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-td-vertical-middle">
                            <thead>
                            <tr>
                                <th scope="col">Pavadinimas</th>
                                <th scope="col">Data nuo</th>
                                <th scope="col">Data iki</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($seasons as $season)
                                <tr>
                                    <td>{{ $season->title }}</td>
                                    <td>{{ $season->start_date }}</td>
                                    <td>{{ $season->end_date }}</td>
                                    <td class="text-right"><a class="btn btn-sm btn-warning"
                                                              href="{{ route('seasons.edit', $season->id) }}">Redaguoti</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-warning" style="margin-bottom: 0;">
                                            Nepavyko rasti nei vieno įrašo nesusijusio su dabartiniu sezonu.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $seasons->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection
