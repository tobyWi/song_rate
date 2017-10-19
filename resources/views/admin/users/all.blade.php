@extends('master')
@section('content')


<div class="row">

    <div class="col-xs-12">

        <h2>Users</h2>

        <a class="btn btn-success" href="{{route('admin.users.export')}}" style="position: absolute; right: 0;">Export Users to Csv</a>

            <table class="table">
                <thead class="table-inverse">
                    <tr>
                        <th>Namn</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>

                <!-- Loop through users -->
                @foreach($users as $user)

                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{route('admin.user.edit', ['user' => $user->id])}}" class="btn btn-default">Edit</a></td>
                        <td>

                            <!-- If user is admin, no delete -->
                            @if(!$user->is_admin)
                                <form action="{{route('admin.user.delete', ['id' => $user->id])}}" method="post">

                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                             
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>                 
                            @endif
                        </td>
                    </tr>

                @endforeach

            </table>
    </div>
</div>

@endsection
