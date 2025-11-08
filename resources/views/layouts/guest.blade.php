<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Poppins] antialiased bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-400 text-gray-900 min-h-screen flex items-center justify-center">
    
    <!-- Outer Container -->
    <div class="w-full max-w-md mx-auto">
        
        <!-- Card -->
        <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl p-8 relative border border-white/20">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="/">
                    <x-application-logo class="w-16 h-16 text-indigo-600" />
                </a>
            </div>

            <!-- Heading -->
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Welcome Back 👋</h2>
            
            <!-- Slot (Form goes here) -->
            {{ $slot }}
        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-white/80 mt-6">
            © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </p>
    </div>

</body>
</html>
