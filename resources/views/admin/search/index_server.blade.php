@extends('layouts.admin_template')
@section('content')

    <h1 class="my-4"><span class="badge badge-success text-white display-1 shadow text-uppercase">Server Data</span></h1>

    @if(Session::has('server_message'))
        <p class="alert alert-info my-3">{{session('server_message')}}</p>
    @endif
    <div class="d-flex justify-content-between">
        <p class="">Displaying {{$servers->count()}} of {{ $servers->total() }} server data.</p>
        <h3 class="mr-4"><span class="badge badge-dark display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('server.create')}}">Data</a>
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
        @if($servers)
            @foreach($servers as $server)
                <tr>
                    <td><a href="{{route('server.show', $server->id)}}"><i class="fas fa-eye text-dark"></i></a></td>
                    <td>{{$server->id ? $server->id : 'No ID'}}</td>
                    <td><span class="rounded-pill text-white bg-success p-1">{{$server->type ? $server->type->name : 'No Name'}}</span></td>
                    <td>{{$server->description ? Str::limit($server->description, 150) : 'No Description'}}</td>
                    <td>{{$server->comment ? Str::limit($server->comment, 150) : 'No Comment'}}</td>
                    <td>{{$server->created_at->diffForHumans()}}</td>
                    <td>{{$server->updated_at->diffForHumans()}}</td>
                    <td class="d-flex">
                        <a href="{{route('server.edit', $server->id)}}"><i class="fas fa-edit text-dark mx-2"></i></a>
                        {!! Form::open(['method'=>'DELETE',
                               'action'=>['App\Http\Controllers\ServerController@destroy', $server->id]]) !!}
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
        {{$servers->links()}}
    </div>
@stop




