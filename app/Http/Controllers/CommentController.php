<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Song;
use Illuminate\Support\Facades\Auth;
use Session;

class CommentController extends Controller
{

    //Admin

    //Get all comments
    public function index() 
    {
        $comments = Comment::all();

        return view('admin.comments.all', ['comments' => $comments]);
    }

    //Delete comment
    public function destroy($id) 
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        Session::flash('msg', "Comment on song ".$comment->Song->title." has been deleted");

        return redirect()->route('admin.comments.all');
    }

    //User

    //Create new comment
    public function store(Song $song)
    {
        $this->validate(request(), [
            'body'      => 'required|string|max:100',
        ]);


        $comment= Comment::create([
            'user_id'   => Auth::user()->id,
            'body'      => request()->body,
            'song_id'   => $song->id         
        ]);

        Session::flash('msg', 'You created a comment'); 

        return redirect()->route('song.show', $song); 
    }
}
