@extends('master')
@section('content')

<div class="row">
    <div class="col-xs-12">

        <h2>Categories</h2>

      
        <table class="table">
            <thead class="table-inverse">
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            @foreach($categories as $category)

            <tbody>
                <tr>
                    <td>{{$category->name}}</td>
                    <td><a href=" {{route('admin.category.edit', ['id' => $category->id])}} " class="btn btn-success">Edit</a></td>
                    <td>
                        <form action="{{route('admin.category.delete', ['id' => $category->id])}}" method="post">
                            {{csrf_field()}}

                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>

            @endforeach

        </table>
    </div>
</div>

<div class="row">

    <div class="col-xs-12">
    
        <h4>Add Category</h4>

        <form action="{{route('admin.category.create')}}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name">
                <button type="submit" class="btn btn-success">Add Category</button>

            </div>        
        </form>

    </div>


</div>


@endsection
