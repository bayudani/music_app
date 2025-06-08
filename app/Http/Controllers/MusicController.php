<?php

namespace App\Http\Controllers;

use App\Models\music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // get all music tracks
    public function index()
    {
        $recentlyPlayedCookie = request()->cookie('recentlyPlayed', '{}');

        $recentlyPlayedData = json_decode($recentlyPlayedCookie, true);

        $recentlyPlayed = collect();

        if (!empty($recentlyPlayedData)) {
            // Ambil key (ID lagu), urutkan berdasarkan waktu klik (nilai timestamp)
            arsort($recentlyPlayedData); // urutkan descending berdasarkan timestamp

            // Ambil 5 ID lagu terakhir yang diklik
            $recentlyPlayedIds = array_slice(array_keys($recentlyPlayedData), 0, 5, true);

            // Ambil data musik sesuai ID, lengkap dengan relasi
            $recentlyPlayed = Music::with('artist', 'genre')
                ->whereIn('id', $recentlyPlayedIds)
                ->get()
                // Urutkan sesuai urutan ID yang diambil
                ->sortBy(function ($music) use ($recentlyPlayedIds) {
                    return array_search($music->id, $recentlyPlayedIds);
                })
                ->values();
        }

        $musics = Music::with('artist', 'genre')->get();
        $popularMusics = Music::where('click_count', '>', 0)
            ->orderBy('click_count', 'desc')
            ->take(5)
            ->get();

        return view('home', compact('musics', 'recentlyPlayed', 'popularMusics'));
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

    public function popular($id)
    {
        $music = Music::with(['artist', 'genre'])->findOrFail($id);

        $recentlyPlayed = explode(',', request()->cookie('recentlyPlayed', ''));
        $recentlyPlayed = array_unique(array_merge([$id], $recentlyPlayed));
        $recentlyPlayed = array_slice($recentlyPlayed, 0, 5); // Batas 5 lagu terakhir

        return response()
            ->view('music.show', compact('music'))
            ->cookie('recentlyPlayed', implode(',', $recentlyPlayed), 60 * 24 * 7); // Simpan 7 hari

        $popularMusics = music::orderBy('click_count', 'desc')
            ->take(5) // ambil 5 lagu terpopuler
            ->get();

        return view('music.popular', compact('popularMusics'));
    }
}
