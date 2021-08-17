<section id="product" class="col-12 col-lg-10">
    <div class="row">
        @if($products)
        @foreach($products as $product)
            <div class="col-md-4 card border-0 my-3 g-3">
                <a href="{{route('productpage', $product->slug)}}">
                    <img class="card-img-top" src="{{$product->photo ? asset('/images/products/') . "/". $product->photo->file : 'http://placehold.it/700x700'}}" alt="{{$product->name}}"></a>
                @auth
                    <div class="card-actions d-flex align-items-center justify-content-between mt-3">
                        <div class=" d-flex">

                            <button wire:click="addToCart({{ $product->id }})" class="p-0 pe-2 text-white text-decoration-none mb-0 d-flex align-items-center card-action border-0" style="background-color: rgb(16,15,15)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill ms-2" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                            <p class="text-uppercase mb-0 ps-3 py-2">ADD TO CART</p>
                        </div>
                        <div>
                            <a class="text-white text-decoration-none" href="{{route('addToList', $product->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill me-2 text-danger" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>f
                                </svg></a>
                            <a class="text-white text-decoration-none" href="{{route('productpage', $product->slug)}}"><span class="card-action pe-2">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                            </svg>
                                            </span>
                            </a>
                        </div>
                    </div>
                @endauth
                <div class="card-body test">
                    <ul class="list-group list-group-flush border-0">
                        <li class="list-group-item border-0 text-uppercase">{{$product->name}}</li>
                        <li class="list-group-item border-0 text-uppercase fw-bold">{{$product->brand ? $product->brand->name : 'No Brand'}}</li>
                        <li class="list-group-item border-0">{{Str::limit($product->body, 250)}}</li>
                        <li class="list-group-item border-0 fw-bold">&euro; {{$product->price}}</li>
                        <span class="d-flex align-items-center">
                                        <li class="list-inline-item ms-3 me-0"><i class="fa fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                        <li class="list-inline-item me-0"><i class="fa fa-star text-secondary"></i></li>
                                        <li class="list-group-item border-0">{{$product->reviews->count()}} Review(s)</li>
                                    </span>
                        <li class="list-group-item border-0">
                            @if($product->productcategories)
                            @foreach($product->productcategories as $productcategory)
                                <span class="badge badge-pill badge-dark p-2 m-1">{{$productcategory->name}}</span>
                            @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</section>

