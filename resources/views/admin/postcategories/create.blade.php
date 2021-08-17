@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Create Category</span></h1>
    <div class="col-6">
        @include('admin.includes.form_error')
    </div>
    <div class="row">
        <div class="col-6 my-2">
            {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminPostCategoriesController@store',
            'files'=>false]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create Category', ['class'=>'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
