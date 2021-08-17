@extends('layouts.admin_template')
@section('content')

    <h1><span class="badge badge-primary display-1 shadow">Product Categories</span></h1>
    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('productcategories.create')}}">Add New</a></span></h3>

    @if(Session::has('productcategory_message'))
        <p class="alert alert-info my-3">{{session('productcategory_message')}}</p>
    @endif
    <p>Displaying {{$productcategories->count()}} of {{ $productcategories->total() }} productcategory(s).</p>
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
        @if($productcategories)
            @foreach($productcategories as $productcategory)
                <tr>
                    <td>{{$productcategory->id ? $productcategory->id : 'No ID'}}</td>
                    @if($productcategory->deleted_at != null)
                        <td>{{$productcategory->name ? $productcategory->name : 'No Category'}}</td>
                    @else
                    <td><a href="{{route('productcategories.edit', $productcategory->id)}}">{{$productcategory->name}}</a></td>
                    @endif
                    <td>{{$productcategory->description ? $productcategory->description : 'No Description'}}</td>
                    <td>{{$productcategory->created_at->diffForHumans()}}</td>
                    <td>{{$productcategory->updated_at->diffForHumans()}}</td>
                    <td>{{$productcategory->deleted_at}}</td>
                    <td>
                        @if($productcategory->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.productcategoryRestore', $productcategory->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminProductCategory@destroy', $productcategory->id]]) !!}
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
        {{$productcategories->links()}}
    </table>

    {{--<h1><span class="badge badge-info display-1 shadow"><i class="fas fa-swimmer mr-2"></i>SubCategories</span></h1>
    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('productsubcategories.create')}}">Add New</a></span></h3>
    @if(Session::has('productsubcategory_message'))
        <p class="alert alert-info my-3">{{session('productsubcategory_message')}}</p>
    @endif
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
        @if($productsubcategories)
            @foreach($productsubcategories as $productsubcategory)
                <tr>
                    <td>{{$productsubcategory->id}}</td>
                    <td><a href="{{route('productsubcategories.edit', $productsubcategory->id)}}">{{$productsubcategory->name}}</a></td>
                    <td>{{$productsubcategory->description}}</td>
                    <td>{{$productsubcategory->created_at->diffForHumans()}}</td>
                    <td>{{$productsubcategory->updated_at->diffForHumans()}}</td>
                    <td>{{$productsubcategory->deleted_at/*->diffForHumans()*/}}</td>
                    <td>
                        @if($productsubcategory->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.productsubcategoryRestore', $productsubcategory->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminProductSubcategory@destroy', $productsubcategory->id]]) !!}
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
    {{$productcategories->links()}}--}}
@stop




