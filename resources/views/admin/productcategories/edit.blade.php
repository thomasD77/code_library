@extends('layouts.admin_template')
@section('content')
    @include('admin.includes.form_error')
    <h1><span class="badge badge-primary display-1 shadow">Edit Category</span></h1>
    <div class="row">
        <div class="col-8">
            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminProductCategory@update',$productcategory->id]])
             !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',$productcategory->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description',$productcategory->description,['class'=>'form-control']) !!}
            </div>
<!--            <div class="form-group">
                {!! Form::label('Select SubCategories: (Press and hold CTRL to Select Categories)') !!}
                {!! Form::select('productsubcategories[]',$productsubcategories, $productcategory->productsubcategories->pluck('id')->toArray(),['class'=>'form-control',
                'multiple'=>'multiple'])!!}
            </div>-->
            <div class="d-flex justify-content-between">
                <div class="form-group mr-1">
                    {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                <div class="d-flex">
                    {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminProductCategory@destroy',
                    $productcategory->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@stop
