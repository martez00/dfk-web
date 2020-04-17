@extends('admin.template')

@section('content')
    <div class="row">
        @include('admin.partials.statsLinks')
        <div class="col-sm-12 col-md-9">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Sezonai
                </div>
                <div class="card-body">
                    <a class="btn btn-outline-primary btn-sm mb-3" href="{{ route('seasons.create') }}">Sukurti naują sezoną</a>
                    <table class="table table-striped table-td-vertical-middle">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pavadinimas</th>
                            <th scope="col">Data nuo</th>
                            <th scope="col">Data iki</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($seasons as $season)
                            <tr>
                                <td>{{ $season->id }}</td>
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
                                        Nėra sukurtų sezonų!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $seasons->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection