<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //

    protected $fillable = [
        'name', 'file_path', 'genre_id', 'user_id', 'album_id', 'playlist_id'
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }
    
    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class);
    }
    }
