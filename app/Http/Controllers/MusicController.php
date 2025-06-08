<?php

namespace App\Http\Controllers;

use App\Models\music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // get all music tracks
    public function index(Request $request)
    {

        $limit = 10;
        $offset = $request->get('offset', 0);

        $musics = Music::with('artist', 'genre')
            ->inRandomOrder()
            ->skip($offset)
            ->take($limit)
            ->get();

        // Kalau permintaan AJAX (load more), kirim partial saja
        if ($request->ajax()) {
            return view('partials._music_items', compact('musics'))->render();
        }

        $musics = Music::all(); // Ganti dengan query sesuai kebutuhan
        $recentlyPlayed = []; // Ganti dengan logika untuk lagu yang baru diputar
        $popularMusics = music::orderBy('click_count', 'desc')
            ->take(5) // ambil 5 lagu terpopuler
            ->get();
        return view('home', compact('musics', 'recentlyPlayed', 'popularMusics')); // Buat view home.blade.php jika perlu
    }


    public function play(Music $music)
    {
        $recentlyPlayed = json_decode(request()->cookie('recentlyPlayed', '{}'), true);

        // Masukkan atau update ID lagu yang sedang diputar
        $recentlyPlayed[$music->id] = now()->timestamp; // atau pakai waktu, supaya akurat urutannya

        // Batasi maksimal 10 lagu terakhir disimpan
        $recentlyPlayed = array_slice($recentlyPlayed, -10, null, true);

        // Simpan ulang cookie
        return redirect()->back()->cookie(
            'recentlyPlayed',
            json_encode($recentlyPlayed),
            60 * 24 * 7 // 7 hari
        );
    }

    public function lazyLoad(Request $request)
    {
        $offset = intval($request->query('offset', 0));
        $limit = intval($request->query('limit', 15));
        $musics = Music::orderBy('created_at', 'desc')->skip($offset)->take($limit)->get();

        $html = '';
        foreach ($musics as $music) {
            $html .= '
            <a href="' . route('music.show', $music->id) . '" class="block bg-white rounded-lg p-4 shadow hover:shadow-lg transition">
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

        $results = music::search($query)->get();

        return view('search-results', compact('results', 'query'));
    }
}
