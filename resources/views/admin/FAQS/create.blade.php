@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <h1><span class="badge badge-primary display-1 shadow">Create FAQ</span></h1>
    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminFAQSController@store']) !!}
    <div class="form-group">
        {!! Form::label('questions', 'Question:') !!}
        {!! Form::text('questions',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('answers', 'Answers:') !!}
        {!! Form::text('answers',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('Create FAQ',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop
