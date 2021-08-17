@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <h1><span class="badge badge-primary display-1 shadow">Create Post</span></h1>
    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminPostsController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Select Category: ')!!}
        {!! Form::select('postcategories[]',$postcategories,null,['class'=>'form-control'])!!}
    </div>
    {{--<div class="form-group">
        {!! Form::label('Select Tag: ')!!}
        {!! Form::select('tag_id[]',$tags,null,['class'=>'form-control', 'multiple'=>'multiple'])!!}
    </div>--}}
    <div class="form-group">
        {!! Form::label('body', 'Description:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop
