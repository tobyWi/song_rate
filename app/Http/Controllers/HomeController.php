<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();

        return view('users.songs.all', ['songs' => $songs]);
        
        return view('users.songs.all');
    }
}
