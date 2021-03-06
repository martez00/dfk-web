<?php

Route::get('/', ['uses' => 'PageController@homepage', 'as' => 'homepage']);
Route::get('/klubas/kontaktai', ['uses' => 'PageController@contacts', 'as' => 'club.contacts']);
Route::get('/klubas/administracija', ['uses' => 'PageController@administration', 'as' => 'club.administration']);
Route::get('/klubas/istorija', ['uses' => 'PageController@history', 'as' => 'club.history']);
Route::get('/klubas/stadionai', ['uses' => 'PageController@stadiums', 'as' => 'club.stadiums']);
Route::get('/atributika', ['uses' => 'PageController@attributes', 'as' => 'attributes']);
Route::get('/parama', ['uses' => 'PageController@support', 'as' => 'support']);
Route::get('/bilietai', ['uses' => 'PageController@tickets', 'as' => 'tickets']);
Route::get('/fanai', ['uses' => 'PageController@fans', 'as' => 'fans']);

//players
Route::get('/zaidejas/{id}/{slug?}', ['uses' => 'PlayerController@show', 'as' => 'players.show']);

//matches
Route::get('/rungtynes/{id}/{slug?}', ['uses' => 'MatchController@show', 'as' => 'matches.show']);
Route::get('/tarpusavio-rungtynes/{first_team_id}/{second_team_id}/{slug?}', ['uses' => 'MatchController@teamsMutualMatches', 'as' => 'matches.teams_mutual_matches']);

// authentication
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'login']);
    Route::post('login', ['uses' => 'Auth\LoginController@login', 'as' => 'postLogin']);
    Route::get('logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'logout']);
});

//admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin_access']], function () {
    Route::get('/', ['uses' => 'Admin\AdminPageController@index', 'as' => 'admin.index']);

    Route::group(['middleware' => ['admin']], function () {
        Route::get('settings', ['uses' => 'Admin\SettingController@edit', 'as' => 'settings']);
        Route::post('settings', ['uses' => 'Admin\SettingController@update', 'as' => 'settings.update']);
    });

    Route::group(['prefix' => 'stats', 'middleware' => ['stats_admin']], function () {
        Route::resource('seasons', 'Admin\SeasonController', ['only' => ['index', 'create', 'edit', 'store', 'update']]);
        Route::resource('tournaments', 'Admin\TournamentController', ['only' => ['index', 'create', 'edit', 'store', 'update']]);
        Route::resource('teams', 'Admin\TeamController', ['only' => ['index', 'create', 'edit', 'store', 'update']]);
        Route::resource('players', 'Admin\PlayerController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);
        Route::resource('matches', 'Admin\MatchController', ['only' => ['index', 'edit', 'update', 'delete']]);

        Route::group(['middleware' => ['season_tournament_belongs_to_team']], function () {
            Route::get('team/{team_id}/{season_id}/{tournament_id}/matches/create', ['uses' => 'Admin\MatchController@create', 'as' => 'matches.create']);
            Route::post('team/{team_id}/{season_id}/{tournament_id}/matches/store', ['uses' => 'Admin\MatchController@store', 'as' => 'matches.store']);
        });

        Route::resource('matches/{match_id}/match-player', 'Admin\MatchPlayerController', ['only' => ['destroy', 'store'], 'names' => ['store' => 'match_player.store', 'destroy' => 'match_player.destroy']]);
        Route::resource('matches/{match_id}/match-event', 'Admin\MatchEventController', ['only' => ['destroy', 'store'], 'names' => ['store' => 'match_event.store', 'destroy' => 'match_event.destroy']]);
    });
});
