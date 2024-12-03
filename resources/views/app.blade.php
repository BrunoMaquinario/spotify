<!-- resources/views/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Spotify App') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: white;
        }
    </style>
</head>
<body class="bg-black text-white font-sans">
    <div class="min-h-screen bg-black">
        @yield('content')
    </div>
</body>
</html>
