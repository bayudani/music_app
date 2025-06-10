@extends('app')

@section('title', 'MusicKita | Musik, Ceria, Kita')

@section('content')
    <!-- Artist Header Section -->
    <div class="relative w-full h-96 rounded-lg overflow-hidden mb-8" id="musicBanner">
        @if ($musics->isNotEmpty())
            @php
                $firstMusic = $musics->random();
            @endphp
            <img id="bannerImage" src="{{ asset('storage/' . $firstMusic->image) }}" alt="Cover Image"
                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100 z-0">
            <div class="absolute inset-0 bg-gradient-to-t from-dark to-transparent z-10"></div>
            <div class="absolute bottom-0 left-0 p-6 z-20">
                <h1 id="bannerArtist" class="text-5xl font-bold mb-2 text-white transition-opacity duration-500 opacity-100">
                    {{ $firstMusic->artist->name ?? 'Top Artist' }}
                </h1>
                <h2 id="bannerTitle" class="text-2xl font-semibold text-white transition-opacity duration-500 opacity-100">
                    {{ $firstMusic->title }}
                </h2>
            </div>
            <!-- Overlay image for cross-fade -->
            <img id="bannerImageNext" src="" alt=""
                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0 pointer-events-none z-0">
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
                    <h2 class="text-2xl font-bold text-darkBlue">Made for you</h2>
                </div>
                <div id="musicGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @foreach ($musics->take(20) as $music)
                        <!-- Card lagu -->
                        <a href="{{ route('music.show', $music->id) }}"
                            class="block bg-white rounded-lg p-4 shadow hover:shadow-lg transition">
                            <div class="aspect-square bg-gray-100 rounded-lg mb-3 overflow-hidden">
                                <img src="{{ asset('storage/' . $music->image) }}" alt="{{ $music->title }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h3 class="font-semibold text-darkBlue">{{ $music->title }}</h3>
                            <p class="text-sm text-gray-700">{{ $music->artist->name ?? '-' }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $music->genre->name ?? '-' }}</p>
                        </a>
                    @endforeach
                </div>
                <!-- Loader -->
                <div id="musicLoader" class="flex justify-center py-6 hidden">
                    <div class="w-8 h-8 border-4 border-accent border-t-transparent rounded-full animate-spin"></div>
                </div>
                <div class="flex justify-center mt-4">
                    <button id="loadMoreBtn" class="bg-darkBlue text-white px-4 py-2 rounded hover:bg-accent transition">
                        Load More
                    </button>

                    <script>
                        let offset = {{ $musics->count() }};
                        const loadMoreBtn = document.getElementById('loadMoreBtn');
                        const musicGrid = document.getElementById('musicGrid');
                        const musicLoader = document.getElementById('musicLoader');

                        loadMoreBtn.addEventListener('click', function() {
                            loadMoreBtn.disabled = true;
                            musicLoader.classList.remove('hidden');

                            fetch(`{{ route('home') }}?offset=${offset}`, {
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }
                                })
                                .then(response => response.text())
                                .then(html => {
                                    if (html.trim() === '') {
                                        loadMoreBtn.style.display = 'none';
                                    } else {
                                        musicGrid.insertAdjacentHTML('beforeend', html);
                                        offset += 20;
                                    }
                                })
                                .finally(() => {
                                    loadMoreBtn.disabled = false;
                                    musicLoader.classList.add('hidden');
                                });
                        });
                    </script>

                </div>
            </div>

            <!-- Back to Top Button -->
            <button id="backToTopBtn"
                class="fixed bottom-8 right-8 z-50 bg-darkBlue text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg transition-opacity duration-300 opacity-0 pointer-events-none hover:bg-accent"
                aria-label="Back to Top">
                ↑
            </button>

            <script>
                // BACK TO TOP BUTTON FUNCTIONALITY
                const backToTopBtn = document.getElementById('backToTopBtn');
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 300) {
                        backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                        backToTopBtn.classList.add('opacity-100');
                    } else {
                        backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
                        backToTopBtn.classList.remove('opacity-100');
                    }
                });
                backToTopBtn.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            </script>

            {{-- <script>
                    let lastId = null;
                    let loading = false;
                    let reachEnd = false;

                    function loadMoreMusics() {
                        if (loading || reachEnd) return;
                        loading = true;
                        document.getElementById('musicLoader').classList.remove('hidden');

                        let url = '{{ route('music.lazyload') }}?limit=15';
                        if (lastId) url += `&after_id=${lastId}`;

                        fetch(url)
                            .then(res => res.text())
                            .then(html => {
                                if (html.trim() === '') {
                                    reachEnd = true;
                                } else {
                                    document.getElementById('musicGrid').insertAdjacentHTML('beforeend', html);
                                    // Ambil lastId baru dari elemen terakhir
                                    let items = document.querySelectorAll('#musicGrid .music-item');
                                    if (items.length > 0) {
                                        lastId = items[items.length - 1].getAttribute('data-id');
                                    }
                                }
                            })
                            .finally(() => {
                                loading = false;
                                document.getElementById('musicLoader').classList.add('hidden');
                            });
                    }

                    window.addEventListener('scroll', function() {
                        if (reachEnd) return;
                        const scrollTop = window.scrollY || document.documentElement.scrollTop;
                        const windowHeight = window.innerHeight;
                        const docHeight = document.documentElement.scrollHeight;
                        if (scrollTop + windowHeight + 200 >= docHeight) {
                            loadMoreMusics();
                        }
                    });
                </script>  --}}

            <!-- Recently Played Section -->
            {{-- <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-darkBlue">Recently played</h2>
                <a href="#" class="text-accent hover:underline">Show all</a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @forelse ($recentlyPlayed as $music)
                    <div class="bg-white rounded-lg p-4 shadow hover:shadow-lg transition">
                        <div class="aspect-square bg-gray-100 rounded-lg mb-3 overflow-hidden">
                            <img src="{{ asset('storage/' . $music->image) }}" alt="{{ $music->title }}"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-semibold text-darkBlue truncate">{{ $music->title }}</h3>
                        <p class="text-sm text-gray-700 truncate">{{ $music->artist->name ?? '-' }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $music->genre->name ?? '-' }}</p>
                    </div>
                @empty
                    <p class="text-gray-400 col-span-full">Belum ada lagu yang diputar.</p>
                @endforelse
            </div> --}}
        </div>

        <!-- Right Sidebar -->
        <div class="lg:col-span-1">
            <!-- Trending Songs -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-darkBlue">POPULAR SONGS</h2>
                    <a href="#" class="text-accent hover:underline">Show all</a>
                </div>
                <div class="space-y-3">
                    @foreach ($popularMusics->take(8) as $music)
                        <a href="{{ route('music.show', $music->id) }}"
                            class="flex items-center bg-white rounded-lg p-2 shadow hover:shadow-lg transition">
                            <div class="w-12 h-12 rounded overflow-hidden mr-3 flex-shrink-0 bg-gray-100">
                                <img src="{{ asset('storage/' . $music->image) }}" alt="{{ $music->title }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-medium text-darkBlue">{{ $music->title }}</h3>
                                <p class="text-sm text-gray-700">{{ $music->artist->name ?? '-' }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Trending Albums -->
            {{-- <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-darkBlue">TRENDING ALBUMS</h2>
                    <a href="#" class="text-accent hover:underline">Show all</a>
                </div>
                <div class="space-y-3">
                    @foreach ($musics->take(1) as $music)
                        <div class="flex items-center bg-white rounded-lg p-2 shadow hover:shadow-lg transition">
                            <div class="w-12 h-12 rounded overflow-hidden mr-3 flex-shrink-0 bg-gray-100">
                                <img src="{{ $music->image ?? '/placeholder.svg?height=48&width=48' }}"
                                    alt="{{ $music->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-medium text-darkBlue">{{ $music->title }}</h3>
                                <p class="text-sm text-gray-700">{{ $music->artist->name ?? '-' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>
    </div>
@endsection
