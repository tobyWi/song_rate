@extends('master')
@section('content')

    <div class="col-12">

        <h2>{{$user->name}}</h2>

        Songs:

        <table class="table table-striped">
            
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created</th>
                </tr>
            </thead>

            @foreach($user->Song as $song)

                <tr>
                    <td><a href=" {{route('song.show', ['song' => $song->id])}} ">
                        {{$song->title}}</a>
                    </td>
                    <td>{{$song->created_at}}</td>
                    <td></td>      
                </tr>

            @endforeach
        
        </table>

    </div>

@endsection
