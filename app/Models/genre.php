<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    //
    protected $fillable = ['name'];
    public function music()
    {
        return $this->hasMany(music::class);
    }
    public function artists()
    {
        return $this->belongsToMany(artist::class, 'music');
    }
}
