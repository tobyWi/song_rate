@extends('master')
@section('content')


<div class="row">

    <div class="col-xs-12">

        <h2>The toplist</h2>


        <table class="table table-hover">    
            <thead>
                <tr>
                    <th>Place</th>
                    <th>Title</th>    
                    <th>User</th>    
                    <th>Created</th>    
                    <th>Genre</th>    
                    <th>Total Votes</th>
                    <th>Total Score</th>    
                </tr>    
            </thead>


            {{-- Loop all the song to a table. An extra vote-column appears for users --}}
  
            <?php $counter = 1; ?>
            @foreach($songs as $song)

                
                <tr>
                    <td>{{$counter}}</td>
                    <td><a href="{{route('song.show', ['song' => $song->id])}}">{{$song->title}}</a></td>
                    <td><a href="{{route('user.show', ['user' => $song->user_id])}}">{{$song->User->name}}</a></td>
                    <td>{{$song->created_at}}</td>
                    <td>{{$song->Category->name}}</td>
                    <td>{{$song->Vote->count()}} </td>
                    <td>{{$song->Vote->sum('vote_value')}}</td>
                </tr>

                <?php $counter++;  ?>
            
            @endforeach
            
        </table>

    </div>
</div>

    @endsection
