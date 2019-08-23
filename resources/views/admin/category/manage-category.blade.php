@extends('admin.master');

@section('main-content')

    <div class="row" >
        <div class="col-sm-offset-2 panel panel-default">
            <h2 class="text-center text-warning">Manage Category</h2>
            @if($message=Session::get('message'))
                <h3 class="text-success text-center">{{$message}}</h3>
            @endif

            <div class="panel-body">
                <table class=" table table-bordered table-hover">
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($manageCategory as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->category_description}}</td>
                        <td>{{$category->publication_status==1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            <a href="{{url('/category/edit-category/'.$category->id)}}" class="btn btn-success"><span>Edit</span></a>
                            <a href="{{url('/category/deleteCategory/'.$category->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-success"><span>Delete</span></a>
                        </td>
                    </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    @endsection