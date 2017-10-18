@extends('master')
@section('content')

<div class="row">

    <div class="col-xs-12">

        <h2>Comments</h2>
 
        <table class="table">
            <thead class="table-inverse">
                <tr>
                    <th>User</th>
                    <th>Comment</th>
                    <th>Song</th>
                    <th></th>
                </tr>
            </thead>

            @foreach($comments as $comment)
                <tr>
                    <td> {{ $comment->User->name }} </td>
                    <td> {{ $comment->body }} </td>
                    <td> <a href="{{route('song.show', ['song' => $comment->Song->id])}}">{{ $comment->Song->title }}</a> </td>
                    <td>
                        <form action="{{route('admin.comment.delete', ['id' => $comment->id])}}" method="post">
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

        <form action="" method="POST">
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
