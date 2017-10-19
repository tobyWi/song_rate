@extends('master')
@section('content')

<div class="row">

    <div class="col-xs-12">
        
        <!-- Update user -->
        <form action="{{route('admin.user.update', ['id' => $user->id])}}" method="post">

            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">

                <label for="name">Name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email">
                <input type="checkbox" name="admin" class="form-control" value="1">
                <button type="submit" class="btn btn-success">Update User</button>
            </div>
        </form>

    </div>
</div>
    

@endsection