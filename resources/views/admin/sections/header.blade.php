<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('admin_index') }}">
        <img src="http://dfk-web.test/images/logo.png" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin_index') }}">Pradinis</a>
            </li>
            @if (Auth::user()->hasRole('admin'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nustatymai
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Administratoriai</a>
                        <a class="dropdown-item" href="#">Administratorių rolės</a>
                        <a class="dropdown-item" href="#">Kiti nustatymai</a>
                    </div>
                </li>
            @endif
            @if (Auth::user()->hasRole('editor'))
                <li class="nav-item">
                    <a class="nav-link" href="#">Naujienos</a>
                </li>
            @endif
            @if (Auth::user()->hasRole('stats_admin'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Statistika
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('seasons.index') }}">Sezonai</a>
                        <a class="dropdown-item" href="{{ route('tournaments.index') }}">Turnyrai</a>
                        <a class="dropdown-item" href="#">Komandos</a>
                        <a class="dropdown-item" href="#">Rungtynės</a>
                        <a class="dropdown-item" href="#">Turnyro lentelės</a>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>