<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class music extends Model
{
    //
    protected $fillable = ['title', 'artist_id', 'genre_id', 'title', 'detail', 'iframe_spotify','image'];
    public function artist()
    {
        return $this->belongsTo(artist::class);
    }
    public function genre()
    {
        return $this->belongsTo(genre::class);
    }
}
