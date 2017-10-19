@extends('master')
@section('content')

    <div class="col-12">

        <h2>{{$user->name}}</h2>

        <h4>Songs:</h4>

        <table class="table table-striped">
            
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Composers</th>
                    <th>Uploaded</th>
                    <th>Score</th>
                </tr>
            </thead>

            <!-- All related user songs -->
            @foreach($user->Song as $song)

                <tr>
                    <td><a href=" {{route('song.show', ['song' => $song->id])}} ">
                        {{$song->title}}</a>
                    </td>
                    <td>{{$song->creators}}</td>
                    <td>{{$song->created_at}}</td>
                    <td>{{$song->Vote->sum('vote_value')}}</td>      
                </tr>

            @endforeach
        
        </table>

    </div>

@endsection
