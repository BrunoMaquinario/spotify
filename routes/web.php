<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;

Route::get('/', [SpotifyController::class, 'index'])->name('home');
Route::get('/login', [SpotifyController::class, 'login'])->name('spotify.login');
Route::get('/callback', [SpotifyController::class, 'callback'])->name('spotify.callback');
Route::get('/top-artists', [SpotifyController::class, 'getTopArtists'])->name('spotify.top_artists');
Route::get('/top-tracks', [SpotifyController::class, 'getTopTracks'])->name('spotify.top_tracks');
