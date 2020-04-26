<div class="card mt-3">
    <div class="card-header font-weight-bold">
        {{ $team->name }} įvykiai
    </div>
    <div class="card-body">
        @if(count($players))
            @include('admin.matches.partials.createEvent', ['team_id' => $team->id, 'players' => $players])
        @else
            <div class="alert alert-danger" style="margin-bottom: 0;">
                Neįvesta komandos sudėtis rungtynėms, todėl negalite priskirti įvykių.
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="table-responsive mt-3">
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
                                    <form method="POST"
                                          action="{{ route('match_event.destroy', ['match_id' => $match->id, 'match_event' => $event->id]) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-danger">Ištrinti</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
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
