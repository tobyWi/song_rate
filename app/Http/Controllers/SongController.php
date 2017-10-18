<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Session;

class SongController extends Controller
{
    public function songsToplist()
    {
        $songs = Song::all();

        $songs = $songs->sortByDesc(function ($song) {
            return $song->Vote->sum('vote_value');
        });

        return view('users.songs.all', ['songs' => $songs]);
    }

    public function index() 
    {

        $songs = Song::all();

        return view('admin.songs.all', ['songs' => $songs]);

    }

    public function edit(Song $song) 
    {
        return view('admin.songs.edit', ['song' => $song]);
    }

    public function update($id)
    {
        $this->validate(request(), [
            'title'         => 'required|string',
            'url'           => 'required|url',
            'description'   => 'required|string|max:200'  
        ]);

        $song = Song::findOrFail($id);

        $song->title = request()->title;
        $song->url = request()->url;
        $song->description = request()->description;

        $song->save();

        Session::flash('msg', 'Song updated');


        return redirect()->route('admin.songs.all');


    }

    public function create()
    {
        $categories = Category::all();

        return view('users.songs.create')->with('categories', $categories);
    }

    public function store()
    {
        $this->validate(request(), [
            'title'         => 'required|string',
            'creators'      => 'required|string',
            'description'   => 'required|max:200',
            'url'           => 'required|url'
        ]);

        Song::create([
            'title'         => request()->title,
            'creators'      => request()->creators,
            'description'   => request()->description,
            'url'           => request()->url,
            'category_id'   => request()->category,
            'user_id'       => Auth::user()->id
        ]);


        Session::flash('msg', 'Song added!');

        return redirect()->back();
    }



    public function showSong(Song $song)
    {
        return view('users.songs.show')->with('song', $song);
    }

}
