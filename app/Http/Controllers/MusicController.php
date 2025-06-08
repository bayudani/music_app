<?php

namespace App\Http\Controllers;

use App\Models\music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // get all music tracks
    public function index()
    {
        $musics = Music::all(); // Ganti dengan query sesuai kebutuhan
        $recentlyPlayed = []; // Ganti dengan logika untuk lagu yang baru diputar
        $popularMusics = music::orderBy('click_count', 'desc')
                          ->take(5) // ambil 5 lagu terpopuler
                          ->get();
        return view('home', compact('musics', 'recentlyPlayed','popularMusics')); // Buat view home.blade.php jika perlu
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

}
