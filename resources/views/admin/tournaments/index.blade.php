@extends('admin.template')

@section('content')
    @include('admin.partials.statsLinks')
    <div class="card">
        <div class="card-header font-weight-bold">
            Turnyrai
        </div>
        <div class="card-body">
            <a class="btn btn-primary btn-sm mb-3" href="{{ route('tournaments.create') }}">Sukurti naują turnyrą</a>
            <table class="table table-striped table-td-vertical-middle">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pavadinimas</th>
                    <th scope="col">Lygmuo</th>
                    <th scope="col">Taurės turnyras?</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($tournaments as $tournament)
                    <tr>
                        <td>{{ $tournament->id }}</td>
                        <td>{{ $tournament->title }}</td>
                        <td>{{ $tournament->level }}</td>
                        <td>{{ $tournament->cup_tournament ? 'Taip' : 'Ne' }}</td>
                        <td class="text-right"><a class="btn btn-sm btn-warning" href="{{ route('tournaments.edit', $tournament->id) }}">Redaguoti</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-warning" style="margin-bottom: 0;">
                                Nėra sukurtų turnyrų!
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $tournaments->links() }}
        </div>
    </div>
@endsection