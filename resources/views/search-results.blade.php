{{-- <h2 class="text-xl mb-4">Hasil pencarian untuk: "{{ $query }}"</h2>

@if ($results->count())
    <ul class="space-y-2">
        @foreach ($results as $music)
            <li class="border-b pb-2">
                <strong>{{ $music->title }}</strong> - {{ $music->artist->name ?? 'Unknown Artist' }}
            </li>
        @endforeach
    </ul>
@else
    <p>Tidak ada hasil ditemukan bro 😔</p>
@endif --}}
@extends('app')
@section('title', 'Music Streaming Platform')

@section('content')

    <a href="{{ url()->previous() }}"
        class="text-accent hover:underline mb-6 inline-flex items-center gap-2 font-semibold group transition">
        <svg class="w-5 h-5 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" stroke-width="2.5"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.25L8.25 12l7.5-7.25" />
        </svg>
        Back
    </a>

    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl mb-4">Hasil pencarian untuk: "{{ $query }}"</h2>
            {{-- <a href="#" class="text-accent hover:underline">Show all</a> --}}
        </div>
        @if ($results->count())

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($results as $music)
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
        @else
            <p>Tidak ada hasil ditemukan bro 😔</p>
        @endif
    </div>
@endsection
