<div class="card mt-3">
    <div class="card-header font-weight-bold">
        {{ $team->name }} įvykiai
    </div>
    <div class="card-body">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-td-vertical-middle">
                        <thead>
                        <tr>
                            <th scope="col">Žaidėjas</th>
                            <th scope="col">Įvykis</th>
                            <th scope="col">Minutė</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($events as $event)
                            <tr>
                                <td>{{ $event->player->name . ' ' . $event->player->surname }}</td>
                                <td>{{ $event->type }}</td>
                                <td>{{ $event->minute }}</td>
                                <td class="text-right">
                                    <button class="btn btn-sm btn-danger">Ištrinti</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="alert alert-warning" style="margin-bottom: 0;">
                                        Įvykiai neįvesti.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
