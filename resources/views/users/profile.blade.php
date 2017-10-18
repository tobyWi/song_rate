@extends('master')
@section('content')

    <div class="col-12">

        <h2>{{Auth::user()->name}}</h2>

        Your Songs:

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Score</th>
                    <th>Votes</th>
                    <th>Created</th>
                </tr>
            </thead>


            @foreach(Auth::user()->Song as $song)

                <tr>
                    <td><a href=" {{route('song.show', ['song' => $song->id])}} ">
                        {{$song->title}}</a>
                    </td>
                    <td>{{$song->Vote->sum('vote_value')}}</td>
                    <td>{{$song->Vote->count('vote_value')}}</td>
                    <td>{{$song->created_at}}</td>
                    <td></td>
                    
                </tr>

            @endforeach
        </table>

    </div>

@endsection
