<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    protected $fillable = ['name', 'image'];
    public function music()
    {
        return $this->hasMany(music::class);
    }
    public function genres()
    {
        return $this->belongsToMany(genre::class, 'music');
    }
}
