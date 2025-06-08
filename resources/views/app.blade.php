<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Music Streaming Platform')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#121826',
                        darkBlue: '#1A2235',
                        accent: '#3B82F6'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-light text-black">
    <!-- Navbar -->
    <nav class="flex items-center justify-between p-4 border-b border-darkBlue">
        <div class="flex items-center">
            <img src="https://via.placeholder.com/24" alt="Logo" class="w-6 h-6">
        </div>
        <form method="GET" action="{{ route('music.search') }}" class="flex flex-1 mx-4">
            <input type="text" name="q" placeholder="Search lagu atau artis..."
                class="flex-grow p-2 rounded-l border border-gray-700 bg-dark text-white focus:outline-none"
                value="{{ request('q') }}">
            <button type="submit"
                class="px-4 bg-accent rounded-r text-white hover:bg-accent-dark transition duration-200">
                Search
            </button>
        </form>
        <div class="flex items-center space-x-4">
            <a href="{{ route('songs') }}"
                class="{{ request()->routeIs('songs') ? 'text-accent' : 'text-gray-400' }} hover:text-accent">Songs</a>
            <a href="{{ route('features') }}"
                class="{{ request()->routeIs('features') ? 'text-accent' : 'text-gray-400' }} hover:text-accent">Features</a>
            <a href="{{ route('about') }}"
                class="{{ request()->routeIs('about') ? 'text-accent' : 'text-gray-400' }} hover:text-accent">About</a>
            <a href="{{ route('contact') }}"
                class="{{ request()->routeIs('contact') ? 'text-accent' : 'text-gray-400' }} hover:text-accent">Contact</a>
        </div>
    </nav>
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>

</html>
