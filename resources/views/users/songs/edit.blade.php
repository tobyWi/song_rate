@extends('master')
@section('content')

<!-- Check if the songs user id is the same as the logged in users -->
@if($song->User->id == Auth::User()->id)

<div class="row">
    <div class="col-xs-12">

        <h2>Edit song</h2>
        
        <!-- Update song form -->
        <form action="" method="post">

            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{$song->title}}" class="form-control">
                <label for="creators">Creators</label>
                <input type="email" name="creators" value="{{$song->creators}}" class="form-control" id="creators">
                <label for="url">Url</label>
                <input type="url" name="url" value="{{$song->url}}" class="form-control">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$song->description}}</textarea>
                <button type="submit" class="btn btn-success">Update song</button>
            </div>
        </form>

    </div>
</div>

<!-- If not Authorized user -->
@else

    No permission

@endif   


@endsection