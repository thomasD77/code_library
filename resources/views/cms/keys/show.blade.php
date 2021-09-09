@extends('layouts.admin_template')
@section('content')
    <div class="d-flex mx-4">
        <div class="d-flex align-items-center col-6 ">
            <h1><span class="badge badge-dark display-1 shadow my-4">Key</span></h1>
            <div class="ml-5">
                <h5 class="card-text">Created:{{$key->created_at->diffForHumans()}}</h5>
                <h5 class="card-text">Updated:{{$key->updated_at->diffForHumans()}}</h5>
            </div>
        </div>

        <div class="card shadow my-4 col-6">
            <div class="card-body  pt-0">
                <h3 class="mr-4 mt-2">
                        <span class="badge badge-dark display-1 shadow my-2 p-3">
                        <a class="text-white text-decoration-none" href="">Subject:</a>
                        </span>
                </h3>
                <p class="card-text">{{ $key->subject ? $key->subject->name : 'no subject' }}</p>
            </div>
        </div>
    </div>

    <div class="d-flex row justify-content-between">
        <div class="d-flex flex-column col-8">
            <div class="card shadow my-3">
                <div class="card-body  pt-0">
                    <h3 class="mr-4 mt-2">
                <span class="badge badge-dark display-1 shadow my-2 p-3">
                <a class="text-white text-decoration-none" href="">Name:</a>
                </span>
                    </h3>
                    <p class="card-text">{{$key->name}}</p>
                </div>
            </div>
            <div class="card shadow my-3">
                <div class="card-body  pt-0">
                    <h3 class="mr-4 mt-2">
                <span class="badge badge-dark display-1 shadow my-2 p-3">
                <a class="text-white text-decoration-none" href="">Login:</a>
                </span>
                    </h3>
                    <p class="card-text">{{$key->login}}</p>
                </div>
            </div>
            <div class="card shadow my-3">
                <div class="card-body  pt-0">
                    <h3 class="mr-4 mt-2">
                <span class="badge badge-dark display-1 shadow my-2 p-3">
                <a class="text-white text-decoration-none" href="">Password:</a>
                </span>
                    </h3>
                    <p class="card-text">{{$key->password}}</p>
                </div>
            </div>
            <div class="card shadow my-3">
                <div class="card-body  pt-0">
                    <h3 class="mr-4 mt-2">
                <span class="badge badge-dark display-1 shadow my-2 p-3">
                <a class="text-white text-decoration-none" href="">Url:</a>
                </span>
                    </h3>
                    <p class="card-text">{{$key->url}}</p>
                </div>
            </div>
            <div class="card shadow my-3">
                <div class="card-body  pt-0">
                    <h3 class="mr-4 mt-2">
                <span class="badge badge-dark display-1 shadow my-2 p-3">
                <a class="text-white text-decoration-none" href="">Email:</a>
                </span>
                    </h3>
                    <p class="card-text">{{$key->email}}</p>
                </div>
            </div>
        </div>
    </div>

@stop




