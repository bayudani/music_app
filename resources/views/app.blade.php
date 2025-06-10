<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MusicKita | Musik, Ceria, Kita')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#121826',
                        darkBlue: '#1A2235',
                        accent: '#3B82F6',
                        accentDark: '#2563eb',
                        light: '#f0f0f0',
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
    <nav class="bg-white shadow-md font-inter relative z-20">
        <div class="max-w-7xl mx-auto flex items-center justify-between py-6 px-4 sm:px-6 lg:px-8 relative">
            <!-- Logo -->
            <a href="{{ route('songs') }}" class="flex items-center flex-shrink-0">
                {{-- <img src="https://via.placeholder.com/32" alt="Logo" class="w-8 h-8 mr-2"> --}}
                <span class="font-bold text-lg text-blue-950">MusicKita</span>
            </a>
            <!-- Hamburger button (mobile) -->
            <div class="flex lg:hidden">
                <button id="navbar-toggle"
                    class="text-darkBlue focus:outline-none focus:ring-2 focus:ring-accent p-2 rounded"
                    aria-label="Toggle navigation">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <!-- Search Bar (desktop & tablet) -->
            @if (request()->routeIs('songs'))
                <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-full max-w-xl px-2 z-10">
                    <form method="GET" action="{{ route('music.search') }}" class="flex items-center w-full">
                        <div class="relative flex-grow">
                            <input type="text" name="q" placeholder="Temukan lagu anda"
                                class="w-full py-2 px-4 pr-10 rounded-full border border-gray-300 bg-white text-darkBlue focus:outline-none focus:border-accent transition duration-200"
                                value="{{ request('q') }}">
                            <button type="submit"
                                class="absolute right-2 top-1/2 transform -translate-y-1/2 text-accent hover:text-accentDark focus:outline-none"
                                aria-label="Cari">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
            <!-- Menu (desktop & tablet) -->
            <div class="hidden lg:flex items-center space-x-6 ml-auto z-10">
                <a href="{{ route('songs') }}"
                    class="{{ request()->routeIs('songs') ? 'text-accent font-semibold' : 'text-gray-500' }} hover:text-accent transition-colors duration-150">Songs</a>
                <a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'text-accent font-semibold' : 'text-gray-500' }} hover:text-accent transition-colors duration-150">About</a>
                <a href="{{ route('contact') }}"
                    class="{{ request()->routeIs('contact') ? 'text-accent font-semibold' : 'text-gray-500' }} hover:text-accent transition-colors duration-150">Contact</a>
            </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div id="navbar-menu" class="lg:hidden hidden px-4 pb-4 bg-white shadow-md border-t border-gray-100">
            <div class="flex flex-col gap-3">
                @if (request()->routeIs('songs'))
                    <form method="GET" action="{{ route('music.search') }}" class="flex items-center w-full mt-2">
                        <div class="relative flex-grow">
                            <input type="text" name="q" placeholder="Temukan lagu anda"
                                class="w-full py-2 px-4 pr-10 rounded-full border border-gray-300 bg-white text-darkBlue focus:outline-none focus:border-accent transition duration-200"
                                value="{{ request('q') }}">
                            <button type="submit"
                                class="absolute right-2 top-1/2 transform -translate-y-1/2 text-accent hover:text-accentDark focus:outline-none"
                                aria-label="Cari">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                @endif
                <!-- MENU LINKS -->
                <a href="{{ route('songs') }}"
                    class="block py-2 px-2 rounded {{ request()->routeIs('songs') ? 'text-accent font-semibold' : 'text-gray-700' }} hover:text-accent transition-colors duration-150">Songs</a>
                <a href="{{ route('about') }}"
                    class="block py-2 px-2 rounded {{ request()->routeIs('about') ? 'text-accent font-semibold' : 'text-gray-700' }} hover:text-accent transition-colors duration-150">About</a>
                <a href="{{ route('contact') }}"
                    class="block py-2 px-2 rounded {{ request()->routeIs('contact') ? 'text-accent font-semibold' : 'text-gray-700' }} hover:text-accent transition-colors duration-150">Contact</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <footer class="relative bg-[#1A2235] text-white font-inter pt-16 pb-6 px-6 md:px-16 overflow-hidden">
        <!-- Decorative Circles (background) -->
        <div class="absolute right-0 top-0 h-full w-1/2 pointer-events-none z-0">
            <div class="absolute right-20 top-0 w-60 h-60 bg-white bg-opacity-5 rounded-full"></div>
            <div class="absolute right-0 top-24 w-72 h-72 bg-white bg-opacity-10 rounded-full"></div>
            <div class="absolute right-40 top-60 w-52 h-52 bg-white bg-opacity-5 rounded-full"></div>
            <div class="absolute right-10 top-80 w-40 h-40 bg-white bg-opacity-10 rounded-full"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto flex flex-col md:flex-row justify-between gap-8">
            <!-- Left: Logo, Mission & Social -->
            <div class="flex-1 flex flex-col gap-8">
                <div>
                    <!-- Logo -->
                    <div class="flex items-center flex-shrink-0">
                        {{-- <img src="https://via.placeholder.com/32" alt="Logo" class="w-8 h-8 mr-2"> --}}
                        <span class="font-bold text-lg text-white">MusicKita</span>
                    </div> <!-- Mission -->
                    <br>
                    <p class="max-w-md text-xs text-white/60 leading-relaxed">
                        Rasakan pengalaman mendengarkan musik yang lebih personal dan interaktif
                        genre unik, hingga karya musisi lokal yang inspiratif.
                        Gabung sekarang di Musickita, jadikan setiap harimu lebih berwarna bersama irama pilihanmu!
                        Musickita – Musik, Cerita, Kita.
                    </p>
                </div>
                <!-- Social -->
                <div class="flex gap-4">
                    <!-- Email -->
                    <a href="https://gmail.com/" target="_blank" rel="noopener" aria-label="LinkedIn"
                        class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                        <!-- Email SVG -->
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M2 4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v0.01L12 13 2 4.01V4zm0 2.236V20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6.236l-10 8.25-10-8.25z" />
                                    </svg>
                    </a>
                    <!-- Instagram -->
                    <a href="https://instagram.com/" target="_blank" rel="noopener" aria-label="Instagram"
                        class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                        <!-- Instagram SVG -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor"
                                stroke-width="2" />
                            <path d="M16 11.37a4 4 0 1 1-2.63-3.76A4 4 0 0 1 16 11.37z" stroke="currentColor"
                                stroke-width="2" />
                            <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" />
                        </svg>
                    </a>
                    <!-- Facebook -->
                    <a href="https://facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"
                        class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                        <!-- Facebook SVG -->
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24H12.82v-9.294H9.692V11.01h3.127V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0" />
                        </svg>
                    </a>
                    <!-- Twitter/X -->
                    <a href="https://twitter.com/" target="_blank" rel="noopener" aria-label="Twitter"
                        class="inline-flex items-center justify-center w-10 h-10 border border-white rounded-full hover:bg-white hover:text-[#1A2235] transition">
                        <!-- Twitter SVG -->
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.56c-.883.392-1.83.656-2.825.775a4.932 4.932 0 0 0 2.165-2.724c-.95.564-2.004.974-3.127 1.195A4.916 4.916 0 0 0 16.616 3c-2.732 0-4.946 2.21-4.946 4.932 0 .387.045.765.127 1.124C7.728 8.807 4.1 6.917 1.671 3.886A4.822 4.822 0 0 0 1 6.15c0 1.708.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.239-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.935 4.935 0 0 1-2.224.083c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 0 1 0 21.543a13.94 13.94 0 0 0 7.548 2.209c9.057 0 14.008-7.496 14.008-13.986 0-.213-.004-.425-.013-.636A9.936 9.936 0 0 0 24 4.56z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right: Menu -->
            <div class="flex-1 flex flex-col justify-center items-start md:items-end">
                <nav class="flex flex-col gap-6 text-2xl md:text-3xl font-medium">
                    {{-- <a href="#" class="flex items-center gap-2 text-white">
                        <span class="inline-block w-2 h-2 rounded-full bg-[#A084FF]"></span> Song
                    </a> --}}
                    <a href="{{ route('songs') }}" class="hover:text-[#A084FF] transition">Song</a>
                    <a href="{{ route('about') }}" class="hover:text-[#A084FF] transition">About</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#A084FF] transition">Contact Us</a>
                </nav>
            </div>
        </div>

        <!-- Divider -->
        <hr class="my-8 border-white/15" />

        <!-- Bottom Row -->
        <div
            class="relative z-10 max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-white/70">
            <div>
                Copy right 2025© atombeat, All Rights Reserved
            </div>
            <div class="flex gap-3">
                <a href="#" class="hover:text-white underline">Privacy Policy</a>
                <span class="mx-1">·</span>
                <a href="#" class="hover:text-white underline">Terms &amp; Conditions</a>
            </div>
        </div>
    </footer>
    <script>
        // Simple navbar toggle for mobile/tablet
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.getElementById('navbar-toggle');
            const menu = document.getElementById('navbar-menu');
            if (toggle) {
                toggle.addEventListener('click', function() {
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>

</html>
