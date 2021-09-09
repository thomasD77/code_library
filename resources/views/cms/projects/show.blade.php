@extends('layouts.admin_template')
@section('content')

    @foreach($keys as $key)
    @if($key->subject->name == 'DATABASE')
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">login</th>
                <th scope="col">password</th>
                <th scope="col">email</th>
                <th scope="col">url</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                <h4 class="mt-5">DATABASE</h4>
                    <tr>
                        <td>{{$key->id ? $key->id : 'No ID'}}</td>
                        <td><span class="rounded-pill text-white bg-success p-2">{{$key->login ? $key->login : 'No login'}}</span></td>
                        <td><a class="text-decoration-none text-dark" href="{{route('projects.show', $key->project->id)}}">{{$key->password ? $key->password : 'No password'}}</a></td>
                        <td>{{$key->email ? $key->email : 'No email'}}</td>
                        <td>{{$key->url ? $key->url : 'No url'}}</td>
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
            </tbody>
        </table>
    @endif
    @endforeach

    @foreach($keys as $key)
    @if($key->subject->name == '(SFTP)FTP')
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">login</th>
                <th scope="col">password</th>
                <th scope="col">email</th>
                <th scope="col">url</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <h4 class="mt-5">(SFTP)FTP</h4>
            <tr>
                <td>{{$key->id ? $key->id : 'No ID'}}</td>
                <td><span class="rounded-pill text-white bg-success p-2">{{$key->login ? $key->login : 'No login'}}</span></td>
                <td><a class="text-decoration-none text-dark" href="{{route('keys.show', $key->id)}}">{{$key->password ? $key->password : 'No password'}}</a></td>
                <td>{{$key->email ? $key->email : 'No email'}}</td>
                <td>{{$key->url ? $key->url : 'No url'}}</td>
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
            </tbody>
        </table>
    @endif
    @endforeach

    @foreach($keys as $key)
    @if($key->subject->name == 'BACKOFFICE')
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">login</th>
                <th scope="col">password</th>
                <th scope="col">email</th>
                <th scope="col">url</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <h4 class="mt-5">BACKOFFICE</h4>
            <tr>
                <td>{{$key->id ? $key->id : 'No ID'}}</td>
                <td><span class="rounded-pill text-white bg-success p-2">{{$key->login ? $key->login : 'No login'}}</span></td>
                <td><a class="text-decoration-none text-dark" href="{{route('keys.show', $key->id)}}">{{$key->password ? $key->password : 'No password'}}</a></td>
                <td>{{$key->email ? $key->email : 'No email'}}</td>
                <td>{{$key->url ? $key->url : 'No url'}}</td>
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
            </tbody>
        </table>
    @endif
    @endforeach

    @foreach($keys as $key)
    @if($key->subject->name == 'EXTRA')
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">login</th>
                <th scope="col">password</th>
                <th scope="col">email</th>
                <th scope="col">url</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <h4 class="mt-5">EXTRA</h4>
            <tr>
                <td>{{$key->id ? $key->id : 'No ID'}}</td>
                <td><span class="rounded-pill text-white bg-success p-2">{{$key->login ? $key->login : 'No login'}}</span></td>
                <td><a class="text-decoration-none text-dark" href="{{route('keys.show', $key->id)}}">{{$key->password ? $key->password : 'No password'}}</a></td>
                <td>{{$key->email ? $key->email : 'No email'}}</td>
                <td>{{$key->url ? $key->url : 'No url'}}</td>
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
            </tbody>
        </table>
    @endif
    @endforeach

    @foreach($keys as $key)
    @if($key->subject->name == 'EMAIL')
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">login</th>
                <th scope="col">password</th>
                <th scope="col">email</th>
                <th scope="col">url</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <h4 class="mt-5">EMAIL</h4>
            <tr>
                <td>{{$key->id ? $key->id : 'No ID'}}</td>
                <td><span class="rounded-pill text-white bg-success p-2">{{$key->login ? $key->login : 'No login'}}</span></td>
                <td><a class="text-decoration-none text-dark" href="{{route('keys.show', $key->id)}}">{{$key->password ? $key->password : 'No password'}}</a></td>
                <td>{{$key->email ? $key->email : 'No email'}}</td>
                <td>{{$key->url ? $key->url : 'No url'}}</td>
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
            </tbody>
        </table>
    @endif
    @endforeach


@stop




