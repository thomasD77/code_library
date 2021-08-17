@extends('layouts.admin_template')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1><span class="badge badge-primary display-1 shadow">Products</span></h1>
        <div class="d-flex justify-content-center mb-5 align-items-center">
            <h6 class="my-0 mr-2 text-uppercase fw-bold">SELECT BRAND: </h6>
            <a class="btn btn-secondary mr-1" href="{{route('products.index')}}">ALL</a>
            @if($brands)
                @foreach($brands as $brand)
                    <a class="btn btn-secondary mr-1 text-uppercase" href="{{route('admin.productsPerBrand',$brand->id)}}">{{$brand->name}}</a>
                @endforeach
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <h3><span class="badge badge-success display-1 shadow my-2">
            <i class="fas fa-plus"></i>
            <a class="text-white text-decoration-none" href="{{route('products.create')}}">Add New</a></span></h3>
        <div class="d-flex justify-content-center mb-5 align-items-center">
            <h6 class="my-0 mr-2 text-uppercase fw-bold">SELECT CATEGORY: </h6>
            <a class="btn btn-secondary mr-1" href="{{route('products.index')}}">ALL</a>
            @if($productcategories)
                @foreach($productcategories as $productcategory)
                    <a class="btn btn-secondary mr-1 text-uppercase" href="{{route('admin.productsPerCategory',$productcategory->id)}}">{{$productcategory->name}}</a>
                @endforeach
            @endif
        </div>
    </div>

    @if(Session::has('product_message'))
        <p class="alert alert-info my-3">{{session('product_message')}}</p>
    @endif
    <p>Displaying {{$products->count()}} of {{ $products->total() }} product(s).</p>

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
<!--            <th scope="col">Tags</th>-->
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
                        <div class="d-flex flex-column">
                            @foreach($product->promos as $promo)
                                <span class="badge bg-warning m-1">{{$promo->name ? $promo->name : ''}}</span>
                            @endforeach
                            <img class="rounded mt-2 img-fluid" height="62" width="62" src="{{$product->photo ? asset('images/products') . "/" . $product->photo->file : 'http://placehold.it/62x62'}}" alt="{{$product->name}}">
                        </div>
                    </td>
                    @if($product->deleted_at != null)
                        <td>{{$product->name ? $product->name : 'No Product'}}</td>
                    @else
                        <td><a href="{{route('products.edit', $product->id)}}">{{$product->name ? $product->name : 'No Product'}}</a></td>
                    @endif
                    <td>{{$product->brand ? $product->brand->name : 'No brand'}}</td>
                    <td>@foreach($product->productcategories as $productcategory)
                            <span class="badge badge-pill badge-dark p-2 my-1">{{$productcategory->name ? $productcategory->name : 'No Category'}}</span>
                        @endforeach</td>
                    <td>{{$product->price ? $product->price : 'No Price'}}</td>
                    <td>{{Str::limit($product->body, 6)}}</td>
<!--                    <td>
                        @foreach($product->tags as $tag)
                            <span class="badge badge-pill badge-success p-2 my-1">{{$tag->name ? $tag->name : 'No Tag'}}</span>
                        @endforeach
                    </td>-->
                    @if($product->deleted_at != null)
                        <td><i class="far fa-stop-circle text-danger ml-3  mt-2 fa-2x"></i></td>
                    @else
                    <td class="d-flex"><a class="btn btn-dark btn-sm text-white mr-1" href="{{route('products.show', $product->id)}}"><i class="fas fa-eye "></i></a>
                        <a class="btn btn-success btn-sm" href="{{route('productpage', $product->slug)}}">Web</a></td>
                    @endif
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
    <div class="d-flex justify-content-center">
        {{$products->links()}}
    </div>

@stop




