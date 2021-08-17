@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <h1><span class="badge badge-primary display-1">Edit brand</span></h1>
    <div class="row">
        <div class="col-8">
            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminBrandsController@update',$brand->id]])
             !!}
            <div class="form-group ">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',$brand->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description',$brand->description,['class'=>'form-control']) !!}
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-group mr-1">
                    {!! Form::submit('Update brand',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                <div class="d-flex">
                    {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminBrandsController@destroy',
                    $brand->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete Brand',['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@stop
