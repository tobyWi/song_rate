@extends('master')
@section('content')

<div class="row">
    <div class="col-12">

        <h2>{{Auth::user()->name}}</h2> 
        <p class="text-right"><a href="{{route('user.profile.edit')}}" class="btn btn-default">Edit Profile</a></p>

        <h4>Your Songs:</h4>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Score</th>
                    <th>Votes</th>
                    <th>Created</th>
                </tr>
            </thead>

            <!-- Get all related user songs -->
            @foreach(Auth::user()->Song as $song)

                <tr>
                    <td><a href=" {{route('song.show', ['song' => $song->id])}} ">
                        {{$song->title}}</a>
                    </td>
                    <td>{{$song->Vote->sum('vote_value')}}</td>
                    <td>{{$song->Vote->count('vote_value')}}</td>
                    <td>{{$song->created_at}}</td>
                    <td><a href="{{route('user.song.edit', ['song' => $song->id])}}" class="btn btn-default">Edit</a></td>
                    
                </tr>

            @endforeach
        </table>

    </div>
</div>
@endsection
