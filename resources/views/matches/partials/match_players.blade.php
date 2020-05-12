<div class="team-palyers" style="margin-bottom: 20px;">
    <h4 class="text-lg-center">{{ $team->name }} startinė sudėtis</h4>
    <table>
        @if(count($startingPlayers))
            @foreach($startingPlayers as $matchPlayer)
                <tr>
                    <td>
                        <strong><a href="{{ route('players.show', ['id' => $matchPlayer->player->id]) }}">{{ $matchPlayer->player->name }} {{ $matchPlayer->player->surname }}</a></strong>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>Nėra informacijos.</td>
            </tr>
        @endif
    </table>
</div>
<div class="team-palyers">
    <h4 class="text-lg-center">{{ $team->name }} atsarginiai
        futbolininkai</h4>
    <table>
        @if(count($benchPlayers))
            @foreach($benchPlayers as $matchPlayer)
                <tr>
                    <td>
                        <strong><a href="{{ route('players.show', ['id' => $matchPlayer->player->id]) }}">{{ $matchPlayer->player->name }} {{ $matchPlayer->player->surname }}</a></strong>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>Nėra informacijos.</td>
            </tr>
        @endif
    </table>
</div>
