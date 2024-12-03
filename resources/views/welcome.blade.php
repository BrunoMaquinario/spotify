<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-white">
    @yield('content')

    @extends('app')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        @if (session('spotify_access_token'))
            <div class="text-center">
                <a href="{{ route('spotify.top_artists') }}" class="px-6 py-3 bg-green-500 text-white rounded-full text-lg">Ver meus Top 50 Artistas</a>
                <a href="{{ route('spotify.top_tracks') }}" class="px-6 py-3 bg-green-500 text-white rounded-full text-lg mt-4 block">Ver minhas Top 50 Músicas</a>
            </div>
        @else
            <div class="text-center">
                <a href="{{ route('spotify.login') }}" class="px-6 py-3 bg-green-500 text-white rounded-full text-lg">Login com Spotify</a>
            </div>
        @endif
    </div>
@endsection

</body>
</html>
