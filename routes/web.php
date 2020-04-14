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
