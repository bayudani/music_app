<?php

namespace App\Http\Controllers;

use App\Models\music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // get all music tracks
    public function index()
    {

        $musics = music::with(['artist', 'genre'])->get();
        // if music not found
        if ($musics->isEmpty()) {
            return redirect()->route('music.index')->with('error', 'No music found');
        }
        return view('music.index', compact('musics'));
    }

    // get music by id
    public function show($id)
    {
        $music = music::with(['artist', 'genre'])->findOrFail($id);
        if (!$music) {
            return redirect()->route('music.index')->with('error', 'Music not found');
        }
        return view('music.show', compact('music'));
    }
}
