@extends('app')

@section('title', 'Music Streaming Platform')

@section('content')
    <!-- Artist Header Section -->
    <div class="relative w-full h-96 rounded-lg overflow-hidden mb-8">
        @if ($musics->isNotEmpty())
            @php
                $firstMusic = $musics->first();
            @endphp
            <img src="{{ asset('storage/' . $firstMusic->image) }}" alt="Cover Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-dark to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-6">
                <div class="flex items-center mb-2">
                    <div class="bg-accent rounded-full p-1 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium">Verified Artist</span>
                </div>
                <h1 class="text-5xl font-bold mb-2">{{ $firstMusic->artist->name ?? 'Top Artist' }}</h1>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                    <span class="text-lg">Musics: {{ $musics->count() }}</span>
                </div>
            </div>
        @else
            <p>Data musik kosong</p>
        @endif
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left and Middle Content -->
        <div class="lg:col-span-2">
            <!-- Made for you Section -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Made for you</h2>
                    <a href="#" class="text-accent hover:underline">Show all</a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @foreach ($musics->take(5) as $music)
                        <a href="{{ route('music.show', $music->id) }}"
                            class="bg-darkBlue rounded-lg p-4 hover:bg-opacity-80 transition block">
                            <div class="aspect-square bg-purple-900 rounded-lg mb-3 overflow-hidden">
                                <img src="{{ asset('storage/' . $music->image) }}" alt="{{ $music->title }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h3 class="font-semibold">{{ $music->title }}</h3>
                            <p class="text-sm text-gray-400">{{ $music->artist->name ?? '-' }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $music->genre->name ?? '-' }}</p>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Recently Played Section -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Recently played</h2>
                <a href="#" class="text-accent hover:underline">Show all</a>
            </div>
            <!-- Recently Played Section -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @forelse ($recentlyPlayed as $music)
                    <div class="bg-darkBlue rounded-lg p-4 hover:bg-opacity-80 transition">
                        <div class="aspect-square bg-teal-900 rounded-lg mb-3 overflow-hidden">
                            <img src="{{ asset('storage/' . $music->image) }}" alt="{{ $music->title }}"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-semibold truncate">{{ $music->title }}</h3>
                        <p class="text-sm text-gray-400 truncate">{{ $music->artist->name ?? '-' }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $music->genre->name ?? '-' }}</p>
                    </div>
                @empty
                    <p class="text-gray-400 col-span-full">Belum ada lagu yang diputar.</p>
                @endforelse
            </div>


        </div>

        <!-- Right Sidebar -->
        <div class="lg:col-span-1">
            <!-- Trending Songs -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">POPULAR SONGS</h2>
                    <a href="#" class="text-accent hover:underline">Show all</a>
                </div>
                <div class="space-y-3">
                    @foreach ($popularMusics->take(8) as $music)
                        <div
                            class="flex items-center bg-darkBlue bg-opacity-50 rounded-lg p-2 hover:bg-opacity-70 transition">
                            <div class="w-12 h-12 rounded overflow-hidden mr-3 flex-shrink-0">
                                <img src="{{ $music->image ?? '/placeholder.svg?height=48&width=48' }}"
                                    alt="{{ $music->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-medium">{{ $music->title }}</h3>
                                <p class="text-sm text-gray-400">{{ $music->artist->name ?? '-' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Trending Albums -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">TRENDING ALBUMS</h2>
                    <a href="#" class="text-accent hover:underline">Show all</a>
                </div>
                <div class="space-y-3">
                    @foreach ($musics->take(1) as $music)
                        <div
                            class="flex items-center bg-darkBlue bg-opacity-50 rounded-lg p-2 hover:bg-opacity-70 transition">
                            <div class="w-12 h-12 rounded overflow-hidden mr-3 flex-shrink-0">
                                <img src="{{ $music->image ?? '/placeholder.svg?height=48&width=48' }}"
                                    alt="{{ $music->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-medium">{{ $music->title }}</h3>
                                <p class="text-sm text-gray-400">{{ $music->artist->name ?? '-' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
