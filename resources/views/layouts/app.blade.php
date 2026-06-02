<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* overflow-x: hidden added here ensures total mobile stability */
        body { background-color: #121212 !important; color: white !important; overflow-x: hidden; }
        .card { background-color: #1e1e1e !important; border: 1px solid #ff69b4 !important; color: white !important; }
        .nav-custom { background-color: #212121 !important; border-bottom: 2px solid #ff69b4 !important; }
        .text-pink { color: #ff69b4 !important; }
        .border-pink { border: 1px solid #ff69b4 !important; }
        .btn-pink { background-color: #ff69b4 !important; color: black !important; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <main class="container mt-4">
            @if (session('status'))
                <div class="alert alert-success" style="background-color: #ff69b4; color: black; border: none; font-weight: bold;">
                    {{ session('status') }}
                </div>
            @endif
            {{ $slot }}
        </main>
    </div>
</body>
</html>