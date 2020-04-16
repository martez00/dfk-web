<div class="row">
    @if(Route::currentRouteName() != 'seasons.index')
        <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
            <a class="btn btn-block btn-secondary" href="{{ route('seasons.index') }}">Sezonai</a>
        </div>
    @endif
    @if(Route::currentRouteName() != 'tournaments.index')
        <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
            <a class="btn btn-block btn-secondary" href="{{ route('tournaments.index') }}">Turnyrai</a>
        </div>
    @endif
    <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
        <a class="btn btn-block btn-secondary" href="#">Komandos</a>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
        <a class="btn btn-block btn-secondary" href="#">Rungtynės</a>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
        <a class="btn btn-block btn-secondary" href="#">Turnyro lentelės</a>
    </div>
</div>