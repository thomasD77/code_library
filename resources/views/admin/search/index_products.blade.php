@extends('layouts.admin_template')
@section('content')

    <h1><span class="badge badge-info display-1 shadow"><i class="fas fa-swimmer mr-2"></i>Products</span></h1>
    {{--<h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>--}}
           {{-- <a class="text-white text-decoration-none" href="{{route('products.create')}}">Add New</a></span></h3>--}}
    @if(Session::has('product_message'))
        <p class="alert alert-info my-3">{{session('product_message')}}</p>
    @endif
    <p>Displaying {{$products->count()}} of {{ $products->total() }} product(s).</p>

    {{--<div class="d-flex justify-content-center mb-5 align-items-center">
        <h6 class="my-0 mr-2">CHOOSE BRAND: </h6>
        <a class="btn btn-secondary mr-1" href="{{route('products.index')}}">ALL</a>
        @if($brands)
            @foreach($brands as $brand)
                <a class="btn btn-secondary mr-1" href="{{route('admin.productsPerBrand',$brand->id)}}">{{$brand->name}}</a>
            @endforeach
        @endif
    </div>

    <div class="d-flex justify-content-center mb-5 align-items-center">
        <h6 class="my-0 mr-2">CHOOSE CATEGORY: </h6>
        <a class="btn btn-secondary mr-1" href="{{route('products.index')}}">ALL</a>
        @if($productcategories)
            @foreach($productcategories as $productcategory)
                <a class="btn btn-secondary mr-1" href="{{route('admin.productsPerCategory',$productcategory->id)}}">{{$productcategory->name}}</a>
            @endforeach
        @endif
    </div>--}}

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Tags</th>
            <th scope="col">Show</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Deleted</th>
        </tr>
        </thead>
        <tbody>
        @if($products)
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        @foreach($product->promos as $promo)
                            <span class="badge bg-warning">{{$promo->name}}</span>
                        @endforeach
                        <img class="rounded mt-2" height="62" width="62" src="{{$product->photo ? asset('images/products') . "/" . $product->photo->file : 'http://placehold.it/62x62'}}" alt="{{$product->name}}">
                    </td>
                    <td><a href="{{route('products.edit', $product->id)}}">{{$product->name}}</a></td>
                    <td>{{$product->brand->name ? $product->brand->name : 'No brand'}}</td>
                    <td>@foreach($product->productcategories as $productcategory)
                            <span class="badge badge-pill badge-dark p-2 my-1">{{$productcategory->name}}</span>
                        @endforeach</td>
                    <td>{{$product->price ? $product->price : 'No Price'}}</td>
                    <td>{{Str::limit($product->body, 6)}}</td>
                    <td>
                        @foreach($product->tags as $tag)
                            <span class="badge badge-pill badge-success">{{$tag->name}}</span>
                        @endforeach
                    </td>
                    <td class="d-flex"><a class="btn btn-dark btn-sm text-white mr-1" href="{{route('products.show', $product->id)}}"><i class="fas fa-eye "></i></a>
                        <a class="btn btn-success btn-sm" href="{{route('productpage', $product->slug)}}">Web</a></td>
                    <td>{{$product->created_at->diffForHumans()}}</td>
                    <td>{{$product->updated_at->diffForHumans()}}</td>
                    <td>{{$product->deleted_at}}</td>
                    <td>
                        @if($product->deleted_at != null)
                            <a class="btn btn-warning" href="{{route('admin.productRestore', $product->id)}}">Restore</a>
                        @else
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminProductsController@destroy', $product->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$products->links()}}
@stop




