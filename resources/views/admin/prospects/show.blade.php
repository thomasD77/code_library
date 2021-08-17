@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Prospects</span></h1>
    <div class="row my-3">
        <div class="col-12">
            <div class="card shadow" style="width: 55rem;">
                <div class="card-body">
                    <h4 class="card-title">Name:</h4>
                    <p class="card-text">{{$prospect->name ? $prospect->name : 'No Name'}}</p>
                    <h4 class="card-title">Email:</h4>
                    <p class="card-text">{{$prospect->email ? $prospect->email : 'No Email'}}</p>
                    <h4 class="card-title">Subject:</h4>
                    <p class="card-text">{{$prospect->subject ? $prospect->subject : 'No Subject'}}</p>
                    <h4 class="card-title">Message:</h4>
                    <p class="card-text">{{$prospect->message ? $prospect->message : 'No Message'}}</p>
                    <hr>
                    <p class="card-text"><span class="font-weight-bold mr-2">Created:</span>{{$prospect->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
    </div>
@stop




