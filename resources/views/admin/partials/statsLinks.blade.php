<div class="col-sm-12 col-md-3 sidebar mb-3">
    <div class="mini-submenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <div class="list-group">
        <span class="list-group-item" style="background-color: rgba(0,0,0,.03);">
            Statistikos meniu
        </span>
        <a href="{{ route('seasons.index') }}" class="list-group-item @if(strpos(Route::currentRouteName(), 'seasons.') !== false) active @endif">
            Sezonai
        </a>
        <a href="{{ route('tournaments.index') }}" class="list-group-item @if(strpos(Route::currentRouteName(), 'tournaments.') !== false) active @endif">
            Turnyrai
        </a>
        <a href="{{ route('teams.index') }}" class="list-group-item @if(strpos(Route::currentRouteName(), 'teams.') !== false) active @endif">
           Komandos
        </a>
        <a href="#" class="list-group-item">
           Rungtynės
        </a>
        <a href="#" class="list-group-item">
            Turnyro lentelė
        </a>
    </div>
</div>