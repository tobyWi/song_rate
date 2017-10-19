@extends('master')
@section('content')

<div class="row">

    <div class="col-xs-12">

        <h2>Songs</h2>

        <table class="table">
            <thead class="table-inverse">
                <tr>
                    <th>Name</th>
                    <th>User</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            @foreach($songs as $song)
                <tr>
                    <td>{{$song->title}}</td>
                    <td>{{$song->User->name}}</td>
                    <td><a class="btn btn-default" href="{{route('admin.song.edit', ['song' => $song->id])}}">Edit</a></td>
                    <td>
                        <form action="{{route('admin.song.delete', ['id' => $song->id])}}" method="post">
                            {{csrf_field()}}

                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
</div>
<div class="row">

    <div class="col-xs-12">
        
        <h4>Add Category</h4>

        <form action="{{route('admin.category.create')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name">
                <button type="submit" class="btn btn-success">Add Category</button>

            </div>        
        </form>
    </div>
</div>

@endsection
