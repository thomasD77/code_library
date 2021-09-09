@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-10 offset-1">
                {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminProjectController@store','files'=>false]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save',['class'=>'btn btn-dark']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
