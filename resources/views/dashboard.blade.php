@extends('app')

@section('content')
    <div class="container mx-auto p-8">
        <!-- Seleção de período -->
        <div class="mb-8 flex justify-center">
            <form method="GET" action="{{ route('spotify.dashboard') }}" class="flex space-x-4">
                <select name="time_range" class="bg-gray-800 text-white p-3 rounded-md shadow-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="short_term" {{ $timeRange === 'short_term' ? 'selected' : '' }}>Último Mês</option>
                    <option value="medium_term" {{ $timeRange === 'medium_term' ? 'selected' : '' }}>Últimos 6 Meses</option>
                    <option value="long_term" {{ $timeRange === 'long_term' ? 'selected' : '' }}>Último Ano</option>
                </select>
                <button type="submit" class="bg-green-600 text-white p-3 rounded-md hover:bg-green-700 transition duration-300">Aplicar</button>
            </form>
        </div>

        <h2 class="text-3xl font-bold text-center mb-8">Top 50 Artistas</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 gap-8">
            @foreach($topArtists as $artist)
                <div class="bg-gray-800 rounded-lg p-4 text-center shadow-lg hover:scale-105 transition transform">
                    <img src="{{ $artist['images'][0]['url'] ?? 'https://via.placeholder.com/100' }}" alt="{{ $artist['name'] }}" class="rounded-full w-24 h-24 mx-auto mb-4">
                    <p class="font-semibold">{{ $artist['name'] }}</p>
                </div>
            @endforeach
        </div>

        <h2 class="text-3xl font-bold text-center mt-12 mb-8">Top 50 Músicas</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 gap-8">
            @foreach($topTracks as $track)
                <div class="bg-gray-800 rounded-lg p-4 text-center shadow-lg hover:scale-105 transition transform">
                    <img src="{{ $track['album']['images'][0]['url'] ?? 'https://via.placeholder.com/100' }}" alt="{{ $track['name'] }}" class="rounded w-24 h-24 mx-auto mb-4">
                    <p class="font-semibold">{{ $track['name'] }}</p>
                    <p class="text-gray-400">{{ $track['artists'][0]['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
