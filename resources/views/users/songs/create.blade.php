@extends('master')
@section('content')

<div class="col-12">
    <h2>Create new song</h2>
</div>
<div class="col-12">


    <form action=" {{route('song.create')}} " method="post">
        {{ csrf_field() }}
       <!--  <input type="hidden" name="user_id" value="{{Auth::user()->id}}"> -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="title">Creators</label>
            <input type="text" name="creators" placeholder="Creators" class="form-control" id="creators">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" placeholder="Description" row=4 class="form-control" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="url">Url to song</label>
            <input type="url" name="url" placeholder="Url to song" class="form-control" id="url">
        </div>
        <div class="form-group">
            <label for="category">Select category</label>
            <select class="form-control" name="category" id="category">
                <option value="">Select genre</option>

                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
        </div>
        <button type="submit" name="button" class="btn btn-success">Create song</button>
    </form>

</div>
@endsection
