<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Song;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    //Function for up-votes that passes song id and vote value
    public function voteUp(Song $song)
    {
        return $this->voteValidationAndSave($song, 1);   
    }

    //Function for down-votes
    public function voteDown(Song $song)
    {
        return $this->voteValidationAndSave($song, -1);
    }

    //Vote validation that flashes error messages or saves vote
    private function voteValidationAndSave($song_id, $vote)
    {
        if ($this->isTheSameUser($song_id)) {

            Session::flash('error', 'You can\'t vote on your own song');

            return redirect()->back();
        

        } elseif ($this->isDoubleVote($song_id)) {

            Session::flash('error', 'You have already voted on this song');

            return redirect()->back();
        } 

        $vote = Vote::create([
            'song_id' => $song_id->id,
            'user_id' => Auth::user()->id,
            'vote_value' => $vote
        ]);


        Session::flash('msg', 'Thank you for your vote!');

        return redirect()->back();
    }


    //Check if logged in user already has voted on the song
    private function isDoubleVote($song)
    {

        foreach($song->Vote as $vote) {



            if ($vote->user_id == Auth::user()->id){
                return true;
           } 
        }
    }

    //Check if logged in user tries to vote on own song
    private function isTheSameUser($song) 
    {

        if ($song->User->id == Auth::user()->id) {

            return true;
            
       }
        
    }


    

   
}
