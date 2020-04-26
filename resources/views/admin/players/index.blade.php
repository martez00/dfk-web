@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
            <div class="card mt-3">
                <div class="card-header font-weight-bold">
                    Žaidėjų paieška
                </div>
                <form action="{{ route('players.index') }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Vardas</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name"
                                   value="{{ Request::input('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="surname">Pavardė</label>
                            <input type="text" class="form-control form-control-sm" id="surname" name="surname"
                                   value="{{ Request::input('surname') }}">
                        </div>
                        <div class="form-group">
                            <label for="position">Pozicija</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="position" name="position">
                                <option value="" selected>...</option>
                                <option value="goalkeeper"
                                        @if(Request::input('position') == 'goalkeeper') selected @endif>Vartininkas
                                </option>
                                <option value="defender" @if(Request::input('position') == 'defender') selected @endif>
                                    Gynėjas
                                </option>
                                <option value="midfielder"
                                        @if(Request::input('position') == 'midfielder') selected @endif>Saugas
                                </option>
                                <option value="striker" @if(Request::input('position') == 'striker') selected @endif>
                                    Puolėjas
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="team">Komanda</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="team" name="team">
                                <option value="" selected>...</option>
                                @foreach($mainTeamWithRelatedTeams as $team)
                                    <option value="{{ $team->id }}"
                                            @if(Request::input('team') == $team->id) selected @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="season">Sezonas</label>
                            <select class="single-select-with-typing form-control form-control-sm" id="season" name="season">
                                <option value="" selected>...</option>
                                @foreach($seasons as $season)
                                    <option value="{{ $season->id }}"
                                            @if(Request::input('season') == $season->id) selected @endif>{{ $season->title }}</option>
                                @endforeach
                            </select>
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
                    Žaidėjai
                </div>
                <div class="card-body">
                    <a class="btn btn-outline-primary btn-sm mb-3" href="{{ route('players.create') }}">Sukurti
                        naują
                        žaidėją</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-td-vertical-middle">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Vardas Pavardė</th>
                                <th scope="col">Gimimo data</th>
                                <th scope="col">Pozicija</th>
                                <th scope="col">Šalis</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($players as $player)
                                <tr>
                                    <td class="text-center"><img src="{{ $player->photoUrl() }}" style="height: 20px;">
                                    <td>{{ $player->name . ' ' . $player->surname }}</td>
                                    <td>{{ $player->birth_date }}</td>
                                    <td>{{ __('main.' . $player->position) }}</td>
                                    <td>{{ $player->country }}</td>
                                    <td class="text-right"><a class="btn btn-sm btn-warning"
                                                              href="{{ route('players.edit', $player->id) }}">Redaguoti</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-warning" style="margin-bottom: 0;">
                                            Nepavyko rasti nei vieno įrašo.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $players->appends(request()->input())->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection
