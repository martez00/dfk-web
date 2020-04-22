@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3 sidebar mb-3">
            @include('admin.partials.statsLinks')
            <div class="card mt-3">
                <div class="card-header font-weight-bold">
                    Turnyrų paieška
                </div>
                <form action="{{ route('tournaments.index') }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Pavadinimas</label>
                            <input type="text" class="form-control form-control-sm" id="title" name="title"
                                   value="{{ Request::input('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="level">Lygmuo</label>
                            <input type="text" class="form-control form-control-sm" id="level" name="level"
                                   value="{{ Request::input('level') }}">
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="cup_tournament"
                                   name="cup_tournament" value="1"
                                   @if (Request::input('cup_tournament')) checked @endif>
                            <label class="form-check-label" for="cup_tournament">Taurės turnyras</label>
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
                    Turnyrai
                </div>
                <div class="card-body">
                    <a class="btn btn-outline-primary btn-sm mb-3" href="{{ route('tournaments.create') }}">Sukurti
                        naują
                        turnyrą</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-td-vertical-middle">
                            <thead>
                            <tr>
                                <th scope="col">Pavadinimas</th>
                                <th scope="col">Lygmuo</th>
                                <th scope="col">Taurės turnyras?</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tournaments as $tournament)
                                <tr>
                                    <td>{{ $tournament->title }}</td>
                                    <td>{{ $tournament->level }}</td>
                                    <td>{{ $tournament->cup_tournament ? 'Taip' : 'Ne' }}</td>
                                    <td class="text-right"><a class="btn btn-sm btn-warning"
                                                              href="{{ route('tournaments.edit', $tournament->id) }}">Redaguoti</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-warning" style="margin-bottom: 0;">
                                            Nepavyko rasti nei vieno įrašo.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $tournaments->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection
