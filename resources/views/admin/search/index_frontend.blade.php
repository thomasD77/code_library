@extends('layouts.admin_template')
@section('content')

    <h1 class="my-4"><span class="badge badge-primary display-1 shadow text-uppercase">Frontend Data</span></h1>

    @if(Session::has('frontend_message'))
        <p class="alert alert-info my-3">{{session('frontend_message')}}</p>
    @endif
    <div class="d-flex justify-content-between">
        <p class="">Displaying {{$frontends->count()}} of {{ $frontends->total() }} frontend data.</p>
        <h3 class="mr-4"><span class="badge badge-dark display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('frontend.create')}}">Data</a>
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
        @if($frontends)
            @foreach($frontends as $frontend)
                <tr>
                    <td><a href="{{route('frontend.show', $frontend->id)}}"><i class="fas fa-eye text-dark"></i></a></td>
                    <td>{{$frontend->id ? $frontend->id : 'No ID'}}</td>
                    <td><span class="rounded-pill text-white bg-success p-1">{{$frontend->type ? $frontend->type->name : 'No Name'}}</span></td>
                    <td>{{$frontend->description ? Str::limit($frontend->description, 150) : 'No Description'}}</td>
                    <td>{{$frontend->comment ? Str::limit($frontend->comment, 150) : 'No Comment'}}</td>
                    <td>{{$frontend->created_at->diffForHumans()}}</td>
                    <td>{{$frontend->updated_at->diffForHumans()}}</td>
                    <td class="d-flex">
                        <a href="{{route('frontend.edit', $frontend->id)}}"><i class="fas fa-edit text-dark mx-2"></i></a>
                        {!! Form::open(['method'=>'DELETE',
                               'action'=>['App\Http\Controllers\FrontendController@destroy', $frontend->id]]) !!}
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
        {{$frontends->links()}}
    </div>
@stop




