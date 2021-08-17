@extends('layouts.admin_template')
@section('content')

    <h1><span class="badge badge-primary display-1 shadow">Categories</span></h1>
    <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('postcategories.create')}}">Add New</a></span></h3>
    @if(Session::has('post_message'))
        <p class="alert alert-info my-3">{{session('post_message')}}</p>
    @endif
    <p>Displaying {{$postcategories->count()}} of {{ $postcategories->total() }} post(s).</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Subject</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Deleted</th>
        </tr>
        </thead>
        <tbody>
        @if($postcategories)
            @foreach($postcategories as $postcategory)
                <tr>
                    <td>{{$postcategory->id ? $postcategory->id : 'No ID'}}</td>
                    @if($postcategory->deleted_at != null)
                        <td>{{$postcategory->name ? $postcategory->name : 'No Name'}}</td>
                    @else
                    <td><a href="{{route('postcategories.edit', $postcategory->id)}}">{{$postcategory->name ? $postcategory->name : 'No Name'}}</a></td>
                    @endif
                    <td>{{$postcategory->created_at->diffForHumans()}}</td>
                    <td>{{$postcategory->updated_at->diffForHumans()}}</td>
                    <td>
                        @if($postcategory->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.postsCategoryRestore', $postcategory->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminPostCategoriesController@destroy', $postcategory->id]]) !!}
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
    {{$postcategories->links()}}
@stop





