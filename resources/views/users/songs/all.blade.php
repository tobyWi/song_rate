@extends('master')
@section('content')


<div class="row">

    <div class="col-xs-12">

        <h2>The toplist</h2>

        <table class="table">    
            <thead class="table-inverse">
                <tr>
                    <th>Title</th>    
                    <th>User</th>    
                    <th>Genre</th>    
                    <th>Total Score</th>    
                    <th>Total Votes</th>
                </tr>    
            </thead>


            {{-- Loop all the song to a table. An extra vote-column appears for users --}}
            
            @foreach($songs as $song)

                <tr>
                    <td><a href="{{route('song.show', ['song' => $song->id])}}">{{$song->title}}</a></td>
                    <td><a href="{{route('user.show', ['user' => $song->user_id])}}">{{$song->User->name}}</a></td>
                    <td>{{$song->Category->name}}</td>
                    <td>{{$song->Vote->sum('vote_value')}}</td>
                    <td>{{$song->Vote->count()}} </td>
                </tr>

            @endforeach

        </table>

    </div>
</div>

    @endsection
