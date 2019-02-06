<?php





Route::get('/', 'NavigationController@index');

Route::get('genres', 'GenresController@index');
Route::get('genres/{id}/edit', 'GenresController@edit');
Route::post('genres/{id}/edit', 'GenresController@store');

Route::get('tracks', 'TracksController@index');
Route::get('tracks/new', 'TracksController@create');
Route::post('/tracks', 'TracksController@store');

Route::get('/playlists', 'PlaylistController@index');
Route::get('playlists/new', 'PlaylistController@create');
Route::get('/playlists/{id}', 'PlaylistController@index');
Route::post('/playlists', 'PlaylistController@store');
