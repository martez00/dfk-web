<div class="card mt-3">
    <div class="card-header font-weight-bold">
        {{ $team->name }} žaidėjai
    </div>
    <div class="card-body">
        @if(count($players))
            <form method="POST" action="{{ route('match_player.store', ['match_id' => $match->id]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="team_id" value="{{ $team->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <select class="single-select-with-typing form-control form-control-sm"
                                name="player_id">
                            <option value="" selected>...</option>
                            @foreach($players as $player)
                                <option value="{{ $player->id }}">{{ $player->name . ' ' . $player->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        ST11: <input type="checkbox" name="starting_lineup" value="1">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-sm btn-primary btn-block">Pridėti</button>
                    </div>
                </div>
            </form>
        @else
            <div class="alert alert-danger mb-0">Nėra sukurta nei vieno žaidėjo, kurį būtų galima priskirti. Jeigu žaidėjas pagrindinės sistemos komandos, prie jo turi būti pažymėta, jog jis žaidžia šiame sezone.</div>
        @endif
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-td-vertical-middle">
                        <thead>
                        <tr>
                            <th scope="col">Žaidėjas</th>
                            <th scope="col">START 11</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($assignedPlayers as $matchPlayer)
                            <tr>
                                <td>{{ $matchPlayer->player->name . ' ' . $matchPlayer->player->surname }}</td>
                                <td class="font-weight-bold">{{ $matchPlayer->starting_lineup ? 'TAIP' : 'NE' }}</td>
                                <td class="text-right">
                                    <form method="POST" action="{{ route('match_player.destroy', ['match_id' => $match->id, 'match_player' => $matchPlayer->id]) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-danger">Ištrinti</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="alert alert-warning" style="margin-bottom: 0;">
                                        Neįvesta sudėtis.
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
