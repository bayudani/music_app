<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class music extends Model
{
    use Searchable;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'title',
        'artist_id',
        'genre_id',
        'detail',
        'iframe_spotify',
        'image',
    ];

    // Eager load relasi saat model dipanggil (terutama untuk indexing)
    protected $with = ['artist'];

    /**
     * Relasi ke tabel artist
     */
    public function artist()
    {
        return $this->belongsTo(artist::class);
    }

    /**
     * Relasi ke tabel genre
     */
    public function genre()
    {
        return $this->belongsTo(genre::class);
    }

    /**
     * Data yang akan diindex untuk pencarian
     */
    public function toSearchableArray()
    {
        // Pastikan artist tidak null
        return [
            'title' => $this->title,
            // 'artist_name' => optional($this->artist)->name, // aman dari null
        ];
    }
}
