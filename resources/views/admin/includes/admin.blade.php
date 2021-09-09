@extends('layouts.admin_template')
@section('content')
    <!-- Content Row -->
    <div class="row">


            <!-- Backend Card Example -->
            <div class="col-12 mb-4 mt-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <a class="text-decoration-none" href="{{route('backend.index')}}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h3 class=" font-weight-bold text-dark text-uppercase mb-1">
                                            Development Data</h3>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 my-2 text-dark">No. Files {{ $backend->total() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list-ul text-dark fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <form class="d-flex mt-5 px-3 py-2" action="{{action('App\Http\Controllers\BackendController@search_item')}}" method="post">
                            @csrf
                            <input name="searchbar" type="text" class="form-control text-dark" placeholder="Search for Data...">
                            <button class="btn btn-dark" type="submit">Search</button>
                        </form>
                    </div>
            </div>

            <!-- Frontend Card Example -->
{{--            <div class="col-md-6 mb-4 mt-4">--}}
{{--                <div class="card border-left-primary shadow h-100 py-2">--}}
{{--                    <a class="text-decoration-none" href="{{route('frontend.index')}}">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row no-gutters align-items-center">--}}
{{--                                <div class="col mr-2">--}}
{{--                                    <h3 class=" font-weight-bold text-primary text-uppercase mb-1">--}}
{{--                                        FRONTEND</h3>--}}
{{--                                    <div class="h5 mb-0 font-weight-bold text-gray-800 my-2 text-primary">No. Files {{ $frontend->total() }}</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <i class="fas fa-list-ul text-primary fa-2x"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <form class="d-flex mt-5 px-3 py-2" action="{{action('App\Http\Controllers\FrontendController@search_item')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <input name="searchbar" type="text" class="form-control text-dark" placeholder="Search for Data...">--}}
{{--                        <button class="btn btn-dark" type="submit">Search</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        <!-- General Card Example -->--}}
{{--        <div class="col-md-6 mb-4 mt-4">--}}
{{--            <div class="card border-left-warning shadow h-100 py-2">--}}
{{--                <a class="text-decoration-none" href="{{route('general.index')}}">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <h3 class=" font-weight-bold text-warning text-uppercase mb-1">--}}
{{--                                    General</h3>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800 my-2 text-warning">No. Files {{ $general->total() }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fas fa-list-ul text-warning fa-2x"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <form class="d-flex mt-5 px-3 py-2" action="{{action('App\Http\Controllers\GeneralController@search_item')}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <input name="searchbar" type="text" class="form-control text-warning" placeholder="Search for Data...">--}}
{{--                    <button class="btn btn-dark" type="submit">Search</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- General Card Example -->--}}
{{--        <div class="col-md-6 mb-4 mt-4">--}}
{{--            <div class="card border-left-success shadow h-100 py-2">--}}
{{--                <a class="text-decoration-none" href="{{route('server.index')}}">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row no-gutters align-items-center">--}}
{{--                            <div class="col mr-2">--}}
{{--                                <h3 class=" font-weight-bold text-success text-uppercase mb-1">--}}
{{--                                    Server</h3>--}}
{{--                                <div class="h5 mb-0 font-weight-bold text-gray-800 my-2 text-success">No. Files {{ $server->total() }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <i class="fas fa-list-ul text-success fa-2x"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <form class="d-flex mt-5 px-3 py-2" action="{{action('App\Http\Controllers\ServerController@search_item')}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <input name="searchbar" type="text" class="form-control text-success" placeholder="Search for Data...">--}}
{{--                    <button class="btn btn-dark" type="submit">Search</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>

@stop

