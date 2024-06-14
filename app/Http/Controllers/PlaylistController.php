<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PlaylistController extends Controller
{
    public function index()
        $playlists = User::find(Auth::id())->playlists;
        $playlists = Auth::user()->playlists;
        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        $songs = Song::all();
        return view('playlists.create', compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $playlist = Auth::user()->playlists()->create($request->all());

        if ($request->has('songs')) {
            $playlist->songs()->sync($request->songs);
        }

        return redirect()->route('playlists.index');
    }

    public function show(Playlist $playlist)
    {
        return view('playlists.show', compact('playlist'));
    }

    public function edit(Playlist $playlist)
    {
        $songs = Song::all();
        return view('playlists.edit', compact('playlist', 'songs'));
    }

    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $playlist->update($request->all());

        if ($request->has('songs')) {
            $playlist->songs()->sync($request->songs);
        }

        return redirect()->route('playlists.index');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('playlists.index');
    }
}