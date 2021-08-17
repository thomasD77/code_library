@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1><span class="badge badge-primary display-1 shadow">Edit Address</span></h1>
                {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminAddressesController@update', $address->id]]) !!}
                <div class="form-group">
                    {!! Form::label('street', 'Street:') !!}
                    {!! Form::text('street',$address->street,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('number', 'Number:') !!}
                    {!! Form::number('number',$address->number,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('postbox', 'Postbox:') !!}
                    {!! Form::number('postbox',$address->postbox,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'City:') !!}
                    {!! Form::text('city',$address->city,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country', 'Country:') !!}
                    {!! Form::text('country',$address->country, ['class'=>'form-control']) !!}
                </div>
                <div class="d-flex justify-content-between my-3">
                    <div class="form-group">
                        {!! Form::submit('Edit Address',['class'=>'btn btn-dark']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="d-flex">
                        {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminAddressesController@destroy',
                        $address->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete Address',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
        </div>
    </div>
@stop
