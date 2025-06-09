@foreach ($musics as $music)
    <a href="{{ route('music.show', $music->id) }}"
       class="block bg-white rounded-lg p-4 shadow hover:shadow-lg transition music-item"
       data-id="{{ $music->id }}">
        <div class="aspect-square bg-gray-100 rounded-lg mb-3 overflow-hidden">
            <img src="{{ asset('storage/' . $music->image) }}" alt="{{ $music->title }}"
                class="w-full h-full object-cover">
        </div>
        <h3 class="font-semibold text-darkBlue">{{ $music->title }}</h3>
        <p class="text-sm text-gray-700">{{ $music->artist->name ?? '-' }}</p>
        <p class="text-xs text-gray-500 mt-1">{{ $music->genre->name ?? '-' }}</p>
    </a>
@endforeach
