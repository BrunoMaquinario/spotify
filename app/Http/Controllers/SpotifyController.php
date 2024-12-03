<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SpotifyController extends Controller
{
    public function index()
    {
        return view('welcome'); // Aqui será a view principal com o botão de login
    }

    public function login()
{
    $url = "https://accounts.spotify.com/authorize";
    $params = [
        'client_id' => env('SPOTIFY_CLIENT_ID'),
        'response_type' => 'code',
        'redirect_uri' => env('SPOTIFY_REDIRECT_URI'),
        'scope' => 'user-top-read',
        'show_dialog' => 'true',  // Força o Spotify a perguntar se o usuário deseja usar a mesma conta ou outra
    ];

    return redirect($url . '?' . http_build_query($params));
}


    public function callback(Request $request)
    {
        $code = $request->get('code');
        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => env('SPOTIFY_REDIRECT_URI'),
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        ]);

        $accessToken = $response->json()['access_token'];
        Session::put('spotify_access_token', $accessToken);

        return redirect()->route('home');
    }

    public function getTopArtists(Request $request)
    {
        $accessToken = Session::get('spotify_access_token');
        
        // Definir o parâmetro time_range
        $timeRange = $request->input('time_range', 'medium_term'); // Default: 'medium_term'
    
        // Requisição para o top 50 artistas
        $artistsResponse = Http::withToken($accessToken)->get('https://api.spotify.com/v1/me/top/artists', [
            'limit' => 50,
            'time_range' => $timeRange,
        ]);
        dd([$accessToken, $timeRange, $artistsResponse]);
    
        $topArtists = $artistsResponse->json()['items'];
    
        return view('top_artists', compact('topArtists', 'timeRange'));
    }
    
    public function getTopTracks(Request $request)
    {
        $accessToken = Session::get('spotify_access_token');
        
        // Definir o parâmetro time_range
        $timeRange = $request->input('time_range', 'medium_term'); // Default: 'medium_term'
    
        // Requisição para o top 50 músicas
        $tracksResponse = Http::withToken($accessToken)->get('https://api.spotify.com/v1/me/top/tracks', [
            'limit' => 50,
            'time_range' => $timeRange,
        ]);
    
        $topTracks = $tracksResponse->json()['items'];
    
        return view('top_tracks', compact('topTracks', 'timeRange'));
    }

    public function logout()
{
    Session::forget('spotify_access_token');
    return redirect()->route('home');
}

    
}