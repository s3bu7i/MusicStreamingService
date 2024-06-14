<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'artist', 'album', 'genre', 'file_path'
    ];

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song');
    }
}