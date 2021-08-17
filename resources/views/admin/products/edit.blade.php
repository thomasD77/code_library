@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Edit Product</span></h1>
    @include('admin.includes.form_error')
    {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminProductsController@update', $product->id],
    'files'=>true]) !!}
    <div class="form-group row">
        <div class="col-6">
            <div class="my-3">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
            </div>
            <div class="my-3">
                {!! Form::label('promo_id', 'Promo:') !!}
                {!! Form::select('promo_id',[''=>'Choose Promo'] + $promos, $product->promo_id,['class'=>'form-control']) !!}
            </div>
            <div class="my-3">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::number('price', $product->price,['class'=> 'form-control text-center', 'step'=> 'any']) !!}
            </div>
            <div class="my-3">
                {!! Form::label('Select Categories: (Press and hold CTRL to Select Categories)') !!}
                {!! Form::select('productcategories[]',$productcategories, $product->productcategories->pluck('id')->toArray(),['class'=>'form-control',
                'multiple'=>'multiple'])!!}
            </div>
<!--            <div class="my-3">
                {!! Form::label( 'Select Tags:') !!}
                {!! Form::select('tags[]',$tags, $product->tags->pluck('id')->toArray(),['class'=>'form-control','multiple' => 'multiple']) !!}
            </div>-->
            <div class="my-3">
                {!! Form::label('brand_id', 'Brand:') !!}
                {!! Form::select('brand_id',[''=>'Choose brand'] + $brands, $product->brand_id,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-6  d-flex justify-content-center align-items-center">
            <img class="img-fluid img-thumbnail" src="{{$product->photo ? asset('images/products') . $product->photo->file : 'http://placehold.it/300x300'}}" alt="{{$product->name}}">
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-8 my-2">
            {!! Form::label('body', 'Description:') !!}
            {!! Form::textarea('body', $product->body,['class'=>'form-control']) !!}
        </div>
        <div class="col-lg-8 my-2">
            {!! Form::label('long_description', 'Long Description:') !!}
            {!! Form::textarea('long_description', $product->long_description,['class'=>'form-control']) !!}
        </div>
        <div class="col-lg-8 my-2">
            {!! Form::label('tec_sheet', 'Tec Form:') !!}
            {!! Form::textarea('tec_sheet', $product->tec_sheet,['class'=>'form-control']) !!}
        </div>
        <div class="col-lg-8 my-2">
            <div class="row">
                <div class="col-12 mt-2">
                    {!! Form::label('photo_id', 'Photo: ') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                    {!! Form::submit('Edit Product', ['class'=>'btn btn-dark']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@stop


