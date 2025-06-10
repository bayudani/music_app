<?php

namespace App\Http\Controllers;

use App\Models\music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // get all music tracks
    public function index(Request $request)
{
    $limit = 20;
    $offset = $request->get('offset', 0);

    if ($request->ajax()) {
        $musics = Music::with('artist', 'genre')
            ->inRandomOrder()
            ->skip($offset)
            ->take($limit)
            ->get();

        return view('partials.music_items', compact('musics'))->render();
    }

    $musics = Music::with('artist', 'genre')
        ->inRandomOrder()
        ->skip(0)
        ->take($limit)
        ->get();

    $recentlyPlayed = []; // Ganti dengan logika yang sesuai
    $popularMusics = Music::orderBy('click_count', 'desc')->take(5)->get();

    return view('home', compact('musics', 'recentlyPlayed', 'popularMusics'));
}



    // public function play(Music $music)
    // {
    //     $recentlyPlayed = json_decode(request()->cookie('recentlyPlayed', '{}'), true);

    //     // Masukkan atau update ID lagu yang sedang diputar
    //     $recentlyPlayed[$music->id] = now()->timestamp; // atau pakai waktu, supaya akurat urutannya

    //     // Batasi maksimal 10 lagu terakhir disimpan
    //     $recentlyPlayed = array_slice($recentlyPlayed, -10, null, true);

    //     // Simpan ulang cookie
    //     return redirect()->back()->cookie(
    //         'recentlyPlayed',
    //         json_encode($recentlyPlayed),
    //         60 * 24 * 7 // 7 hari
    //     );
    // }

    public function lazyLoad(Request $request)
    {
        $limit = intval($request->query('limit', 15));
        $exclude = $request->query('exclude');
        $excludeIds = $exclude ? explode(',', $exclude) : [];

        $query = Music::query();
        if (!empty($excludeIds)) {
            $query->whereNotIn('id', $excludeIds);
        }
        $musics = $query->inRandomOrder()->limit($limit)->get();

        $html = '';
        foreach ($musics as $music) {
            $html .= '
        <a data-id="' . $music->id . '" href="' . route('music.show', $music->id) . '" class="music-item block bg-white rounded-lg p-4 shadow hover:shadow-lg transition">
            <div class="aspect-square bg-gray-100 rounded-lg mb-3 overflow-hidden">
                <img src="' . asset('storage/' . $music->image) . '" alt="' . e($music->title) . '" class="w-full h-full object-cover">
            </div>
            <h3 class="font-semibold text-darkBlue">' . e($music->title) . '</h3>
            <p class="text-sm text-gray-700">' . ($music->artist->name ?? '-') . '</p>
            <p class="text-xs text-gray-500 mt-1">' . ($music->genre->name ?? '-') . '</p>
        </a>
        ';
        }
        return $html;
    }


    public function features()
    {
        return view('features'); // Buat view features.blade.php jika perlu
    }

    public function about()
    {
        return view('about'); // Buat view about.blade.php jika perlu
    }

    public function contact()
    {
        return view('contact'); // Buat view contact.blade.php jika perlu
    }

    public function show($id)
    {
        $music = Music::findOrFail($id);
        // Tambah 1 ke jumlah klik
        $music->increment('click_count');
        return view('detail', compact('music')); // Buat view music/show.blade.php jika perlu
    }
    public function popular()
    {
        $popularMusics = music::orderBy('click_count', 'desc')
            ->take(5) // ambil 5 lagu terpopuler
            ->get();

        return view('music.popular', compact('popularMusics'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        // Jika keyword kosong, redirect ke halaman awal
        if (empty($query)) {
            return redirect()->route('songs');
        }

        $results = music::search($query)->get();

        return view('search-results', compact('results', 'query'));
    }
}
