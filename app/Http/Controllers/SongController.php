<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Genre;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('name', '');
        
        if ($search) {
            $songs = Song::where('name', 'like', '%'.$search.'%')->get();
        } else {
            $songs = Song::all();
        }

        if (Auth::check()) {
            $user = Auth::user();  
        } else {
            $user = null;
        }

        $playlists = Playlist::all();

        return view("home", [
            'songs' => $songs,
            'search' => $search,
            'user' => $user,
            'playlists' => $playlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $genres = Genre::all();

        return view('song.create', [
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validation
            $request->validate([
                'name' => 'required|max:255',
                'song' => 'required'
           ]);


            $name = $request->name.'.mp3';
            $file = $request->file('song');
            $path = $file->storeAs('music', $name, 'public');
            $genre = $request->genre;
            $genreId = Genre::where('name', $genre)->value('id');
            
            $userId = Auth::id();

            Song::create([
                'name' => $request->name,
                'file_path' => $path,
                'genre_id' => $genreId ?? null,
                'user_id' => $userId
            ]);

            return redirect()->route('song.index')->with('success', 'Song uploaded successfully!');

    }

    public function append(Song $song) {
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }
}
