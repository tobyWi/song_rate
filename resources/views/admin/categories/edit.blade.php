@extends('master')
@section('content')

<div class="row">
    
    <div class="col-xs-12">

        <form action="{{route('admin.category.update', ['id' => $category->id])}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
                <input type="text" name="name" value="{{$category->name}}" class="form-control">
                <button type="submit" class="btn btn-success">Update category</button>
            </div>

        </form>
        
    </div>

</div>    

@endsection