@extends('layouts.admin_template')
@section('content')
    <h1><span class="badge badge-primary display-1 shadow">Product</span></h1>
    <div class="row my-3">
        <div class="col-md-6">
            <div class="card shadow" >
                <div class="card-body">
                    <h4 class="card-title">Name:</h4>
                    <p class="card-text">{{$product->name ? $product->name : 'No Name'}}</p>
                    <h4 class="card-title">Brand:</h4>
                    <p class="card-text">{{$product->brand ? $product->brand->name : 'No Brand'}}</p>
                    <h4 class="card-title">Category:</h4>
                    <p>@foreach($product->productcategories as $productcategory)
                            <span class="badge badge-pill badge-primary p-2 text-white">{{$productcategory->name ? $productcategory->name : 'No Category'}}</span>
                        @endforeach</p>
                    <h4 class="card-title">Price:</h4>
                    <p class="card-text">{{$product->price ? $product->price : 'No Price'}}</p>
<!--                    <h4 class="card-title">Tags:</h4>
                    <p>@foreach($product->tags as $tag)
                            <span class="badge badge-pill badge-success">{{$tag->name}}</span>
                        @endforeach</p>-->
                    <h4 class="card-title">Description:</h4>
                    <p class="card-text">{{$product->body ? $product->body : 'No Text'}}</p>
                    <hr>
                    <p class="card-text"><span class="font-weight-bold mr-3">Created:</span>{{$product->created_at->diffForHumans()}}</p>
                    <p class="card-text"><span class="font-weight-bold mr-3">Updated:</span>{{$product->updated_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="{{$product->photo ? asset('images/products') ."/". $product->photo->file : 'http://placehold.it/300x300'}}" alt="{{$product->name}}">
        </div>
    </div>




@stop




