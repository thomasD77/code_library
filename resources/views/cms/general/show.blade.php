@extends('layouts.admin_template')
@section('content')
    <div class="d-flex mx-4">
        <div class="d-flex align-items-center col-6 ">
            <h1><span class="badge badge-dark display-1 shadow my-4">General Data</span></h1>
            <div class="ml-5">
                <h5 class="card-text">Created:{{$general->created_at->diffForHumans()}}</h5>
                <h5 class="card-text">Updated:{{$general->updated_at->diffForHumans()}}</h5>
            </div>
        </div>

        <div class="card shadow my-4 col-6">
            <div class="card-body  pt-0">
                <h3 class="mr-4 mt-2">
                        <span class="badge badge-dark display-1 shadow my-2 p-3">
                        <a class="text-white text-decoration-none" href="">Type:</a>
                        </span>
                </h3>
                <p class="card-text">{{$general->type->name}}</p>
            </div>
        </div>
    </div>

    <div class="d-flex row justify-content-between">
        <div class="d-flex flex-column col-8">
            <div class="card shadow my-3">
                <div class="card-body  pt-0">
                    <h3 class="mr-4 mt-2">
                <span class="badge badge-dark display-1 shadow my-2 p-3">
                <a class="text-white text-decoration-none" href="">Description:</a>
                </span>
                    </h3>
                    <p class="card-text">{{$general->description}}</p>
                </div>
            </div>
            <div class="card shadow my-3">
                <div class="card-body  pt-0">
                    <h3 class="mr-4 mt-2">
                <span class="badge badge-dark display-1 shadow my-2 p-3">
                <a class="text-white text-decoration-none" href="">Comment:</a>
                </span>
                    </h3>
                    <p class="card-text">{{$general->comment}}</p>
                </div>
            </div>
            <div class="card shadow my-3">
                <div class="card-body  pt-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="mr-4 mt-2">
                        <span class="badge badge-dark display-1 shadow my-2 p-3">
                            <a class="text-white text-decoration-none" href="">Notes:</a>
                        </span>
                        </h3>
                        <a href="{{route('general.edit', $general->id)}}"><i class="fas fa-edit text-dark m-3"></i></a>
                    </div>
                    <p class="card-text">{!! $general->notes !!}</p>
                </div>
            </div>
        </div>

        <div class="card shadow my-3 col-3 mr-5">
            <div class="card-body  pt-0">
                <h3 class="mr-4 mt-2">
                <span class="badge badge-dark display-1 shadow my-2 p-3">
                <a class="text-white text-decoration-none" href="">Images:</a>
                </span>
                </h3>
                <div class="d-flex flex-column">
                    @if($photos)
                        @foreach($photos as $photo)
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                <img class="rounded m-2" height="200" width="200" src="{{$photo ? asset('images/general') . $photo->file : 'http://placehold.it/62x62'}}" alt="{{$general->type}}">
                                {!! Form::open(['method'=>'DELETE',
                                   'action'=>['App\Http\Controllers\GeneralController@destroyPhoto', $photo->id]]) !!}
                                    <div class="form-group">
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=>'submit','class'=>'text-white bg-danger border-0 mt-2 rounded']) !!}
                                    </div>
                                {!! Form::close() !!}
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal{{ $photo->id }}">
                                    <h5>{{ $photo->file }}</h5>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $photo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class=" modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $photo->file }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <img class="rounded m-2"  src="{{$photo ? asset('images/general') . $photo->file : 'http://placehold.it/62x62'}}" alt="{{$general->type}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>
            </div>
        </div>

    </div>










@stop




