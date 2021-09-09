@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-10 offset-1">
                {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\KeyController@store','files'=>false]) !!}
                <div class="form-group col-6 px-0">
                    {!! Form::label('Select Project Name:') !!}
                    {!! Form::select('project_id',$projects,null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group col-6 px-0">
                    {!! Form::label('Select Subject:') !!}
                    {!! Form::select('subject_id',$categories,null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url', 'Url:') !!}
                    {!! Form::text('url',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('login', 'Login:') !!}
                    {!! Form::text('login',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::text('password',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save',['class'=>'btn btn-dark']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
