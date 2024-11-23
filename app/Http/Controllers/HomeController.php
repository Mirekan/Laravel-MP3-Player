<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{
    //
    public function index()
    {

        if (Auth::check()) {
            $user = Auth::user();
            return redirect()->route('song.index');
        } else {
            $user = null;
        }
        
        $songs = Song::all();
        
        return view('home', [
            'songs' => $songs,
            'search' => null,
            'user' => $user ?? null
        ]);
    }
}
