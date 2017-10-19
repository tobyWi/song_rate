@extends('master')
@section('content')

<div class="row">

    <div class="col-xs-12">

        <h2>Users</h2>

        <table class="table">
            <thead class="table-inverse">
                <tr>
                    <th>Name</th>
                    <th>Member since</th>
                    <th>Number of songs</th>
                </tr>
            </thead>

            @foreach($users as $user)
                <tr>
                    <td><a href="{{route('user.show', ['user' => $user->id])}}">{{$user->name}}</a></td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->Song->count()}}</td>
                </tr>
            @endforeach

        </table>

    </div>
</div>


@endsection
