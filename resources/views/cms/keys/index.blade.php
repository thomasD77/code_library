@extends('layouts.admin_template')
@section('content')

    <h1 class="my-4"><span class="badge badge-dark display-1 shadow text-uppercase">Keys</span></h1>

    @if(Session::has('key_message'))
        <p class="alert alert-info my-3">{{session('key_message')}}</p>
    @endif
    <div class="d-flex justify-content-between">
        <p class="">Displaying {{$keys->count()}} of {{ $keys->total() }} Keys data.</p>
        <h3 class="mr-4"><span class="badge badge-dark display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('keys.create')}}">Data</a>
        </span>
        </h3>
    </div>
    <form class="d-flex px-3 py-2" action="{{action('App\Http\Controllers\KeyController@search_item')}}" method="post">
        @csrf
        <input name="searchbar" type="text" class="form-control text-dark" placeholder="Search for Data...">
        <button class="btn btn-dark" type="submit">Search</button>
    </form>
    <table class="table table-striped">
        <thead>
        <tr> <th scope="col"></th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Url</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($keys)
            @foreach($keys as $key)
                <tr>
                    <td><a href="{{route('keys.show', $key->id)}}"><i class="fas fa-eye text-dark fa-2x"></i></a></td>
                    <td>{{$key->id ? $key->id : 'No ID'}}</td>
                    <td><span class="rounded-pill text-white bg-success p-2">{{$key->subject ? $key->subject->name : 'No subject'}}</span></td>
                    <td><a class="text-decoration-none text-dark" href="{{route('keys.show', $key->id)}}">{{$key->url ? $key->url : 'No url'}}</a></td>
                    <td>{{$key->email ? $key->email : 'No email'}}</td>
                    <td>{{$key->created_at->diffForHumans()}}</td>
                    <td>{{$key->updated_at->diffForHumans()}}</td>
                    <td class="d-flex">
                        <a href="{{route('keys.edit', $key->id)}}"><i class="fas fa-edit text-dark mx-2"></i></a>
                        {!! Form::open(['method'=>'DELETE',
                               'action'=>['App\Http\Controllers\KeyController@destroy', $key->id]]) !!}
                            <div class="form-group">
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=>'submit','class'=>'text-danger border-0 bg-transparent']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$keys->links()}}
    </div>
@stop




