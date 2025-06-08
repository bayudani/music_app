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
        return view('home', compact('musics', 'recentlyPlayed'));
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
