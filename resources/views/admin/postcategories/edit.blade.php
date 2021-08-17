@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Create Category</span></h1>
    <div class="col-6">
        @include('admin.includes.form_error')
    </div>
    <div class="row">
        <div class="col-6">
            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminPostCategoriesController@update',
            $postcategory->id],
            'files'=>false]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $postcategory->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
