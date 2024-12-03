<!-- resources/views/top_tracks.blade.php -->
@extends('app')

@section('content')
    <div class="container mx-auto p-8">
        <!-- Seleção de período -->
        <div class="mb-6">
            <form method="GET" action="{{ route('spotify.top_tracks') }}" class="flex justify-center space-x-4">
                <select name="time_range" class="p-2 rounded-md">
                    <option value="short_term" {{ $timeRange === 'short_term' ? 'selected' : '' }}>Último Mês</option>
                    <option value="medium_term" {{ $timeRange === 'medium_term' ? 'selected' : '' }}>Últimos 6 Meses</option>
                    <option value="long_term" {{ $timeRange === 'long_term' ? 'selected' : '' }}>Último Ano</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Aplicar</button>
            </form>
        </div>

        <h2 class="text-2xl font-bold mt-12 mb-6">Top 50 Músicas</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
            @foreach($topTracks as $track)
                <div class="bg-gray-800 p-4 rounded-lg text-center">
                    <img src="{{ $track['album']['images'][0]['url'] ?? 'https://via.placeholder.com/100' }}" alt="{{ $track['name'] }}" class="rounded w-24 h-24 mx-auto mb-4">
                    <p>{{ $track['name'] }}</p>
                    <p>{{ $track['artists'][0]['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
