<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            pinkneon: '#ff69b4',
                            darkbg: '#111111',
                            cardbg: '#1e1e1e',
                        }
                    }
                }
            }
        </script>
        <style>
    label { color: #ffffff !important; font-weight: 600; }
    a { color: #ff69b4 !important; }
    a:hover { color: #ffffff !important; text-decoration: underline !important; }
    button, .btn-primary { background-color: #ff69b4 !important; color: #000000 !important; font-weight: bold !important; text-transform: uppercase !important; padding: 10px 20px !important; border-radius: 5px !important; }
    input { background-color: #111111 !important; color: #ffffff !important; border: 1px solid #ff69b4 !important; }
</style>
    </head>
    <body class="font-sans text-gray-200 antialiased" style="background-color: #111111;">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <div class="mb-2">
                <h1 style="color: #ff69b4; font-size: 2rem; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em;">
                    My Pink Playlist
                </h1>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-6 shadow-lg overflow-hidden sm:rounded-lg" 
                 style="background-color: #1e1e1e; border: 1px solid #ff69b4; box-shadow: 0 0 15px rgba(255, 105, 180, 0.2);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>