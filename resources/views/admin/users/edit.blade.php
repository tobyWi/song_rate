@extends('master')
@section('content')

<div class="row">

    <div class="col-xs-12">
        
        <form action="{{route('admin.user.update', ['id' => $user->id])}}" method="post">

            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
                <button type="submit" class="btn btn-success">Update User</button>
            </div>
        </form>

    </div>
</div>
    

@endsection