@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-1">
                <h1><span class="badge badge-primary display-1 shadow">Create Address</span></h1>
                {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminAddressesController@store']) !!}
                <div class="form-group">
                    {!! Form::label('street', 'Street:') !!}
                    {!! Form::text('street',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('number', 'Number:') !!}
                    {!! Form::number('number',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('postbox', 'Postbox:') !!}
                    {!! Form::number('postbox',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'City:') !!}
                    {!! Form::text('city',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country', 'Country:') !!}
                    {!! Form::text('country',null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::hidden('user',$user->id,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create Address',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
@stop
