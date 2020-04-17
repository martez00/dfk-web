@extends('admin.template')

@section('content')
    <div class="row">
        @include('admin.partials.statsLinks')
        <div class="col-sm-12 col-md-9">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Komandos
                </div>
                <div class="card-body">
                    <a class="btn btn-outline-primary btn-sm mb-3" href="{{ route('teams.create') }}">Sukurti naują
                        komandą</a>
                    <table class="table table-striped table-td-vertical-middle">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
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
                            <tr>
                                <td>{{ $team->id }}</td>
                                <td class="text-center"><img src="{{ $team->logoUrl() }}" style="height: 20px;"></td>
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
                                        Nėra sukurtų komandų!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $teams->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection