@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Newsletter</span></h1>
    <div class="row my-3">
        <div class="col-md-6">
            <div class="card border-0 shadow py-5">
                <div class="card-body">
                    <h4 class="card-title fw-bold">Title:</h4>
                    <p class="card-text">{{$newsletter->title ? $newsletter->title : 'No Title'}}</p>
                    <h4 class="card-title fw-bold">Text:</h4>
                    <p class="card-text">{{$newsletter->body ? $newsletter->body : 'No Body'}}</p>
                    <p class="card-text">Created:{{$newsletter->created_at->diffForHumans()}}</p>
                    <p class="card-text">Updated:{{$newsletter->updated_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img class="shadow img-fluid" src="{{$newsletter->photo ? asset('images/newsletters') . $newsletter->photo->file : 'http://placehold.it/62x62'}}" alt="{{$newsletter->name}}">
        </div>
        <div class="col-12 mt-5">
            <form action="{{action('App\Http\Controllers\AdminNewslettersController@newsletter_send_email')}}" method="post">
                @csrf
                <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
                <input type="hidden" name="photo_file" value="{{$newsletter->photo->file }}">
                <button type="submit" class="btn btn-dark ">SEND <i class="fa fa-angle-right ml-2"></i></button>
            </form>
        </div>
    </div>
@stop




