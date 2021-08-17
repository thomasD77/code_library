@extends('layouts.admin_template')
@section('content')

    <h1 class="my-4"><span class="badge badge-danger display-1 shadow text-uppercase">Backend Data</span></h1>

    @if(Session::has('backend_message'))
        <p class="alert alert-info my-3">{{session('backend_message')}}</p>
    @endif
    <div class="d-flex justify-content-between">
        <p class="">Displaying {{$backends->count()}} of {{ $backends->total() }} Backend data.</p>
        <h3 class="mr-4"><span class="badge badge-dark display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('backend.create')}}">Data</a>
        </span>
        </h3>
    </div>
    <table class="table table-striped">
        <thead>
        <tr> <th scope="col"></th>
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
            <th scope="col">Comment</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($backends)
            @foreach($backends as $backend)
                <tr>
                    <td><a href="{{route('backend.show', $backend->id)}}"><i class="fas fa-eye text-dark"></i></a></td>
                    <td>{{$backend->id ? $backend->id : 'No ID'}}</td>
                    <td><span class="rounded-pill text-white bg-success p-1">{{$backend->type ? $backend->type->name : 'No Name'}}</span></td>
                    <td>{{$backend->description ? Str::limit($backend->description, 150) : 'No Description'}}</td>
                    <td>{{$backend->comment ? Str::limit($backend->comment, 150) : 'No Comment'}}</td>
                    <td>{{$backend->created_at->diffForHumans()}}</td>
                    <td>{{$backend->updated_at->diffForHumans()}}</td>
                    <td class="d-flex">
                        <a href="{{route('backend.edit', $backend->id)}}"><i class="fas fa-edit text-dark mx-2"></i></a>
                        {!! Form::open(['method'=>'DELETE',
                               'action'=>['App\Http\Controllers\BackendController@destroy', $backend->id]]) !!}
                            <div class="form-group">
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=>'submit','class'=>'text-danger border-0']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$backends->links()}}
    </div>
@stop




