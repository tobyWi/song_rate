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
                        <th>Created At</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>


                @foreach($users as $user)

                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a href="{{route('admin.user.edit', ['user' => $user->id])}}" class="btn btn-success">Edit</a></td>
                        <td>
                            <form action="{{route('admin.user.delete', ['id' => $user->id])}}" method="post">
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

@endsection
