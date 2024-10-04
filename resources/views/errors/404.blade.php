<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BlogHub</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('logo_bloghub.png') }}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/custom.js'])
    <style>
        .trix-button {
            color: white !important;
        }
    </style>
</head>

<body class="antialiased text-white">
    <div class="min-h-screen bg-[#111827] font-['Poppins']">
        <div class="flex items-center justify-center min-h-screen px-2">
            <div class="text-center">
                <h1 class="text-3xl font-bold">404 Not Found!</h1>
                <p class="text-2xl font-medium mt-4">Oops! Page Not Found</p>
                <p class="mt-4 mb-8 w-2/3 m-auto">The page you are looking for cannot be found. It might have been removed, had its
                    name changed, or is temporarily unavailable. Please check the URL and try again.
                </p>
                <a href="{{ route('dashboard') }}"
                    class="px-6 py-3 bg-white font-semibold rounded-full hover:bg-purple-100 transition duration-300 ease-in-out dark:bg-gray-700 dark:text-white hover:bg-[#FFD600] hover:text-black">
                    Go Home
                </a>
            </div>
        </div>
    </div>
</body>
