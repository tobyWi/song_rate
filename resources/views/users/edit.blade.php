@extends('master')
@section('content')

<div class="row">

    <div class="col-xs-12">

        <h2>Edit profile</h2>
        
        <!-- Authorized user update -->
        <form action="{{route('user.profile.update', ['id' => Auth::User()->id])}}" method="post">

            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{Auth::User()->name}}" class="form-control" id="name">
                <label for="E-mail">E-mail:</label>
                <input type="email" name="email" value="{{Auth::User()->email}}" class="form-control" id="email">
                <button type="submit" class="btn btn-success">Update User</button>
            </div>
        </form>

        <form action="{{route('user.profile.update.password')}}" method="post">

            {{csrf_field()}}
            {{method_field('PUT')}}
            
            <label for="password">New password</label>
            <input type="password" id="password" name="new_password" class="form-control">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" name="new_password_confirmation" id="password_confirmation" class="form-control">
            <button type="submit" class="btn btn-success">Change password</button>

        </form>

    </div>
</div>
    

@endsection