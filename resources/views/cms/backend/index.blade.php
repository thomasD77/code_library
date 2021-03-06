@extends('layouts.admin_template')
@section('content')

    <h1 class="my-4"><span class="badge badge-dark display-1 shadow text-uppercase">Development Data</span></h1>

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
    <form class="d-flex px-3 py-2" action="{{action('App\Http\Controllers\BackendController@search_item')}}" method="post">
        @csrf
        <input name="searchbar" type="text" class="form-control text-dark" placeholder="Search for Data...">
        <button class="btn btn-dark" type="submit">Search</button>
    </form>
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
                    <td><span class="rounded-pill text-white bg-success p-2">{{$backend->type ? $backend->type->name : 'No Name'}}</span></td>
                    <td><a class="text-decoration-none text-dark" href="{{route('backend.show', $backend->id)}}">{{$backend->description ? Str::limit($backend->description, 150) : 'No Description'}}</a></td>
                    <td>{{$backend->comment ? Str::limit($backend->comment, 150) : 'No Comment'}}</td>
                    <td>{{$backend->created_at->diffForHumans()}}</td>
                    <td>{{$backend->updated_at->diffForHumans()}}</td>
                    <td class="d-flex">
                        <a href="{{route('backend.edit', $backend->id)}}"><i class="fas fa-edit text-dark mx-2"></i></a>
                        {!! Form::open(['method'=>'DELETE',
                               'action'=>['App\Http\Controllers\BackendController@destroy', $backend->id]]) !!}
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
        {{$backends->links()}}
    </div>

    <div class="popup modal fade" id="popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">&nbsp;</div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-cancel"></i></span>
                    </button>
                </div>

                <div class="modal-body">
                    <div>
                        <p>      Latexco Solutions is present during Foam Expo 2021. We would be pleased to welcome you in Hall 1 ??? Stand 160.
                            9 ??? 11 november 2021 ??? Stuttgart, Germany
                        </p>
                    </div>
                    <div class="d-md-flex justify-content-md-about align-items-md-center">
                        <img src="{{asset('images/foam-logo.png')}}" alt="">
                        <a target="_blank" href="https://www.foam-expo.eu/"><button class="btn btn-primary ml-md-5 mt-3">Click here</button></a>
                    </div>
                </div><!--/ .modal-body -->
            </div>
        </div>
    </div><!--/ .modal -->


    <script>$('#popup').modal('show');</script>
@stop




