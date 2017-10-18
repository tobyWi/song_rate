@extends('master')
@section('content')


<div class="row">

    <div class="col-xs-12">

        <form action="{{route('admin.song.update', ['id' => $song->id])}}" method="post">

            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{$song->title}}" class="form-control" id="title">
                <label for="url">Url</label>
                <input type="url" name="url" id="url" class="form-control" value="{{$song->url}}">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="10">{{$song->description}}</textarea>
                <button type="submit" class="btn btn-success">Update song</button>
            </div>

        </form>

    </div>

</div>
    

@endsection