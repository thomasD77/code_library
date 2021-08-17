@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Brands</span></h1>
    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('brands.create')}}">Add New</a></span></h3>
    @if(Session::has('brand_message'))
        <p class="alert alert-info my-3">{{session('brand_message')}}</p>
    @endif
    <p>Displaying {{$brands->count()}} of {{ $brands->total() }} brand(s).</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Deleted</th>
        </tr>
        </thead>
        <tbody>
        @if($brands)
            @foreach($brands as $brand)
                <tr>
                    <td>{{$brand->id ? $brand->id : 'No ID'}}</td>
                    @if($brand->deleted_at != null)
                        <td>{{$brand->name ? $brand->name : 'No Name'}}</td>
                    @else
                    <td><a href="{{route('brands.edit', $brand->id)}}">{{$brand->name ? $brand->name : 'No Name'}}</a></td>
                    @endif
                    <td>{{$brand->description ? $brand->description : 'No Description'}}</td>
                    <td>{{$brand->created_at->diffForHumans()}}</td>
                    <td>{{$brand->updated_at->diffForHumans()}}</td>
                    <td>{{$brand->deleted_at}}</td>
                    <td>
                        @if($brand->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.brandRestore', $brand->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminBrandsController@destroy', $brand->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$brands->links()}}
@stop




