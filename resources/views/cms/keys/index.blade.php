@extends('layouts.admin_template')
@section('content')

    <h1 class="my-4"><span class="badge badge-dark display-1 shadow text-uppercase">Keys</span></h1>
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-between">
            <p class="">Displaying {{$keys->count()}} Keys data.</p>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <h3 class="mr-4"><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('keys.create')}}">Data</a>
        </span>
        </h3>
        <h3 class="mr-4"><span class="badge badge-warning display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-decoration-none text-dark" href="{{route('projects.create')}}">Project</a>
        </span>
        </h3>
    </div>


    <form class="d-flex px-3 py-2 mb-5" action="{{action('App\Http\Controllers\KeyController@search_item')}}" method="post">
        @csrf
        <input name="searchbar" type="text" class="form-control text-dark" placeholder="Search for Data...">
        <button class="btn btn-dark" type="submit">Search</button>
    </form>


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Project</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @if($keys)
            @foreach($keys as $key)
                <tr>
                    <td>{{$key->id ? $key->id : 'No ID'}}</td>
                    <td><a class="text-decoration-none text-dark" href="{{route('projects.show', $key->project->id)}}">{{$key->project ? $key->project->name : 'No name'}}</a></td>
                    <td>{{$key->created_at->diffForHumans()}}</td>
                    <td>{{$key->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('projects.show', $key->project->id)}}"><button class="border border-none bg-dark rounded"><i class="fas fa-eye text-white "></i></button></a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop




