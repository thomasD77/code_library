@extends('layouts.admin_template')
@section('content')

    <h1 class="my-4"><span class="badge badge-dark display-1 shadow text-uppercase">Keys</span></h1>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-between">
        </div>

    </div>


    <table class="table table-striped">
        <thead>
        <tr> <th scope="col"></th>
            <th scope="col">Project</th>
            <th scope="col">Email</th>
            <th scope="col">Url</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="{{route('projects.show', $key->project->id)}}"><i class="fas fa-eye text-dark fa-2x"></i></a></td>
                <td>{{$key->id ? $key->id : 'No ID'}}</td>
                <td><a class="text-decoration-none text-dark" href="{{route('keys.show', $key->id)}}">{{$key->project ? $key->project->name : 'No name'}}</a></td>
                <td><span class="">{{$key->email ? $key->email : 'No email'}}</span></td>
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

@stop




