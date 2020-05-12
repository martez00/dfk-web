<div class="row">
    <div class="col-md-12">
        <div class="h3-next-match">
        @if($matches[0]->is_fixture == true)
            <!--Last Match Result Start-->
                <div class="next-match-box">
                    <h4>Artimiausios rungtynės</h4>
                    <div class="nms-box">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4">
                                <div class="team-logo-left">
                                    <img src="{{ $matches[0]->homeTeam()->logoUrl() }}">
                                    <strong>{{ $matches[0]->homeTeam()->name }}</strong>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="nms-info"><strong class="vs">PRIEŠ</strong>
                                    <p><strong>{{ $matches[0]->tournament->title }}</strong></p>
                                    <p>{{ $matches[0]->date }}
                                        | {{ date("H:i", strtotime($matches[0]->time)) }}</p>
                                    <p><span>{{ $matches[0]->location }}</span></p>
                                    <a href="#">PLAČIAU</a></div>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <div class="team-logo-right">
                                    <img src="{{ $matches[0]->awayTeam()->logoUrl() }}">
                                    <strong>{{ $matches[0]->awayTeam()->name }}</strong></div>
                            </div>
                        </div>
                    </div>
                    <!--Last Match Result End-->
                </div>
        @else
            <!--Last Match Result Start-->
                <div class="next-match-box">
                    <h4>Paskutinių rungtynių rezultatas</h4>
                    <div class="nms-box">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="team-logo-left">
                                    <strong>{{ $matches[0]->homeTeam()->name }}</strong> <img
                                            src="{{ $matches[0]->homeTeam()->logoUrl() }}"
                                    ></div>
                            </div>
                            <div class="col-sm-4">
                                <div class="nms-info">
                                    <strong class="vs">
                                        {{ $matches[0]->homeTeamScore() }}
                                        : {{ $matches[0]->awayTeamScore() }}
                                    </strong>
                                    <p><strong>{{ $matches[0]->tournament->title }}</strong></p>
                                    <p>{{ $matches[0]->date }} | {{ date("H:i", strtotime($matches[0]->time)) }}</p>
                                    <p><span>{{ $matches[0]->location }}</span></p>
                                    <a href="#">Plačiau</a></div>
                            </div>
                            <div class="col-sm-4">
                                <div class="team-logo-right"><img
                                            src="{{ $matches[0]->awayTeam()->logoUrl() }}">
                                    <strong>{{ $matches[0]->awayTeam()->name }}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Last Match Result End-->
            @endif
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="point-table-widget">
            <table>
                <thead>
                <tr>
                    <th>P</th>
                    <th>Team</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                    <th>Pts</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0; $i < 15; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td><img src="images/tl-logo1.png"> <strong>Bethlehem</strong></td>
                        <td>22</td>
                        <td>4</td>
                        <td>2</td>
                        <td><strong>140</strong></td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>