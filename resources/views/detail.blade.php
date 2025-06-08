<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $music->title }} - Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white min-h-screen">
    <div class="max-w-4xl mx-auto p-6">
        <a href="{{ url()->previous() }}" class="text-accent hover:underline mb-6 inline-block">← Back</a>

        <div class="flex flex-col md:flex-row gap-6 items-start">
            <img src="{{ asset('storage/' . $music->image) }}" alt="{{ $music->title }}"
                class="w-full md:w-64 h-auto rounded-lg object-cover shadow-lg">

            <div class="flex-1">
                <h1 class="text-3xl font-bold mb-2">{{ $music->title }}</h1>
                <p class="text-lg text-gray-400">Artist: {{ $music->artist->name ?? '-' }}</p>
                <p class="text-md text-gray-500 mb-4">Genre: {{ $music->genre->name ?? '-' }}</p>
            </div>
        </div>

        {{-- Spotify Iframe --}}
        @php use Illuminate\Support\Str; @endphp
        @if ($music->iframe_spotify && Str::contains($music->iframe_spotify, '<iframe'))
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-3">Listen on Spotify:</h2>
                <div class="w-full aspect-video">
                    {!! $music->iframe_spotify !!}
                </div>
            </div>
        @else
            <p class="mt-8 text-sm text-gray-400">Spotify player not available.</p>
        @endif
    </div>

    <script>
        // Simpan ID lagu ke cookie saat halaman detail dibuka
        document.addEventListener('DOMContentLoaded', function() {
            const musicId = "{{ $music->id }}";

            // Ambil isi cookie sebelumnya
            let recently = [];
            const cookie = document.cookie.split('; ').find(row => row.startsWith('recentlyPlayed='));
            if (cookie) {
                recently = cookie.split('=')[1].split(',');
            }

            // Tambahkan ID terbaru di depan dan hapus duplikat
            recently = recently.filter(id => id !== musicId);
            recently.unshift(musicId);

            // Batasi 5 item
            if (recently.length > 5) recently = recently.slice(0, 5);

            // Simpan kembali ke cookie
            document.cookie = `recentlyPlayed=${recently.join(',')}; path=/`;
        });
    </script>

</body>

</html>
