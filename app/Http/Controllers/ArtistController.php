<?php

namespace App\Http\Controllers;

use App\Models\artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    // get all artists
    public function index()
    {
        $artists = artist::all();
        return view('artists', compact('artists'));
        // return response()->json(['message' => 'List of artists']);
    }
}
