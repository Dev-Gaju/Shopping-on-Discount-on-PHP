@extends('admin.master');

@section('main-content')

    <div class="row" >
        <div class="col-sm-offset-2 panel panel-default">
            <h2 class="text-center text-warning">Manage Brand</h2>
            @if($message=Session::get('message'))
                <h3 class="text-success text-center">{{$message}}</h3>
            @endif

            <div class="panel-body">
                <table class=" table table-bordered table-hover">
                    <tr>
                        <th>Brand ID</th>
                        <th>Brand Name</th>
                        <th>Brand Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($manageBrand as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->brand_name}}</td>
                            <td>{{$brand->brand_description}}</td>
                            <td>{{$brand->publication_status==1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{url('/brand/edit-brand/'.$brand->id)}}" class="btn btn-success"><span>Edit</span></a>
                                <a href="{{url('/brand/delete-brand/'.$brand->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-success"><span>Delete</span></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection