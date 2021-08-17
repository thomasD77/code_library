@extends('layouts.admin_template')
@section('content')

    <h1 class="my-4"><span class="badge badge-warning display-1 text-white shadow text-uppercase">General Data</span></h1>

    @if(Session::has('general_message'))
        <p class="alert alert-info my-3">{{session('general_message')}}</p>
    @endif
    <div class="d-flex justify-content-between">
        <p class="">Displaying {{$generals->count()}} of {{ $generals->total() }} general data.</p>
        <h3 class="mr-4"><span class="badge badge-dark display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('general.create')}}">Data</a>
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
        @if($generals)
            @foreach($generals as $general)
                <tr>
                    <td><a href="{{route('general.show', $general->id)}}"><i class="fas fa-eye text-dark"></i></a></td>
                    <td>{{$general->id ? $general->id : 'No ID'}}</td>
                    <td><span class="rounded-pill text-white bg-success p-1">{{$general->type ? $general->type->name : 'No Name'}}</span></td>
                    <td>{{$general->description ? Str::limit($general->description, 150) : 'No Description'}}</td>
                    <td>{{$general->comment ? Str::limit($general->comment, 150) : 'No Comment'}}</td>
                    <td>{{$general->created_at->diffForHumans()}}</td>
                    <td>{{$general->updated_at->diffForHumans()}}</td>
                    <td class="d-flex">
                        <a href="{{route('general.edit', $general->id)}}"><i class="fas fa-edit text-dark mx-2"></i></a>
                        {!! Form::open(['method'=>'DELETE',
                               'action'=>['App\Http\Controllers\GeneralController@destroy', $general->id]]) !!}
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
        {{$generals->links()}}
    </div>
@stop




