<?php

namespace App\Http\Controllers;

use App\Models\music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // get all music tracks
    public function index()
    {
        $musics = Music::with(['artist', 'genre'])->get();
        // $musics = Music::all(); // Ganti dengan query sesuai kebutuhan
        // $recentlyPlayed = []; // Ganti dengan logika untuk lagu yang baru diputar
        $recentIds = [];
        if (isset($_COOKIE['recentlyPlayed'])) {
            $recentIds = explode(',', $_COOKIE['recentlyPlayed']);
        }

        $recentlyPlayed = $musics->whereIn('id', $recentIds)->sortBy(function ($music) use ($recentIds) {
            return array_search($music->id, $recentIds);
        });

        return view('home', [
            'musics' => $musics,
            'recentlyPlayed' => $recentlyPlayed,
        ]);
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
        return view('detail', compact('music')); // Buat view music/show.blade.php jika perlu
    }
}
