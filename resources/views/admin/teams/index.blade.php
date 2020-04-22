@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
            <div class="card mt-3">
                <div class="card-header font-weight-bold">
                    Komandų paieška
                </div>
                <form action="{{ route('teams.index') }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Pavadinimas</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name"
                                   value="{{ Request::input('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="short_name">Sutrumpinimas</label>
                            <input type="text" class="form-control form-control-sm" id="short_name" name="short_name"
                                   value="{{ Request::input('short_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="country">Šalis</label>
                            <input type="text" class="form-control form-control-sm" id="country" name="country"
                                   value="{{ Request::input('country') }}">
                        </div>
                        <div class="form-group">
                            <label for="city">Miestas</label>
                            <input type="text" class="form-control form-control-sm" id="city" name="city"
                                   value="{{ Request::input('city') }}">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="has_related_teams"
                                   name="has_related_teams" value="1"
                                   @if (Request::input('has_related_teams')) checked @endif>
                            <label class="form-check-label" for="has_related_teams">Turi susijusių komandų</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_related_to_other_team"
                                   name="is_related_to_other_team" value="1"
                                   @if (Request::input('is_related_to_other_team')) checked @endif>
                            <label class="form-check-label" for="is_related_to_other_team">Yra susijusi su kita komanda</label>
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="main_team"
                                   name="main_team" value="1"
                                   @if (Request::input('main_team')) checked @endif>
                            <label class="form-check-label" for="main_team">Pagrindinė komanda (parinkta nustatymuose)</label>
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
                    Komandos
                </div>
                <div class="card-body">
                    <a class="btn btn-outline-primary btn-sm mb-3" href="{{ route('teams.create') }}">Sukurti naują
                        komandą</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-td-vertical-middle">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Pavadinimas</th>
                                <th scope="col">Trumpinys</th>
                                <th scope="col">Šalis</th>
                                <th scope="col">Miestas</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teams as $team)
                                <tr @if($team->id == mainTeamId() || $team->related_team_id == mainTeamId()) style="background-color: rgba(73,134,230,0.74); color: white; font-weight: bold;" @endif>
                                    <td class="text-center"><img src="{{ $team->logoUrl() }}" style="height: 20px;">
                                    </td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->short_name }}</td>
                                    <td>{{ $team->country }}</td>
                                    <td>{{ $team->city }}</td>
                                    <td class="text-right"><a class="btn btn-sm btn-warning"
                                                              href="{{ route('teams.edit', $team->id) }}">Redaguoti</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-warning" style="margin-bottom: 0;">
                                            Nepavyko rasti nei vieno įrašo.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $teams->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection
