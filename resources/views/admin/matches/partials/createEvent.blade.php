<form action="{{ route('match_event.store', ['match_id' => $match->id]) }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="team_id" value="{{ $team->id }}">
    <div class="form-group">
        <label for="new-event-type-{{ $team_id }}" class="font-weight-bold">Įvykis</label>
        <select class="single-select-with-typing form-control form-control-sm createEvent" name="type"
                id="new-event-type-{{ $team_id }}" required>
            <option value="goal">Įvartis</option>
            <option value="penalty_goal">Įvartis iš 11m. baudinio</option>
            <option value="penalty_fail">Neįmuštas 11m. baudinys</option>
            <option value="assist">Rezultatyvus perdavimas</option>
            <option value="red_card">Raudona kortelė</option>
            <option value="yellow_card">Geltona kortelė</option>
            <option value="sub_in">Išeina į aikštę keitimo metu</option>
            <option value="sub_out">Išeina iš aikštės keitimo metu</option>
        </select>
    </div>
    <div class="form-group">
        <label for="player-{{ $team_id }}">Žaidėjas</label>
        <select class="single-select-with-typing form-control form-control-sm" id="player-{{ $team_id }}"
                name="player_id" required>
            @foreach($players as $matchPlayer)
                <option value="{{ $matchPlayer->player->id }}">{{  $matchPlayer->player->name . ' ' .  $matchPlayer->player->surname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="minute-{{ $team_id }}">Minutė</label>
        <input type="text" class="form-control form-control-sm" id="minute-{{ $team_id }}" name="minute" required>
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-primary btn-block">Sukurti įvykį</button>
    </div>
</form>
