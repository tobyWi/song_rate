@extends('master')
@section('content')

<div class="row">

    <div class="col-xs-12">
        
        <!-- Authorized user update -->
        <form action="{{route('user.profile.update', ['id' => Auth::User()->id])}}" method="post">

            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{Auth::User()->name}}" class="form-control" id="name">
                <label for="E-mail">E-mail:</label>
                <input type="email" name="email" value="{{Auth::User()->email}}" class="form-control" id="email">
                <label for="password">New password</label>
                <input type="password" name="password" class="form-control" id="password">
        
                <button type="submit" class="btn btn-success">Update User</button>
            </div>
        </form>

    </div>
</div>
    

@endsection