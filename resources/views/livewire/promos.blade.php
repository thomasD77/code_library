<section id="nieuw" class="row custom-margin d-none d-md-block" >
    <div class="col-12 col-lg-8 offset-lg-2">
        <h2 class="my-3 my-lg-5 text-center text-uppercase">SHOP</h2>
        <div class="d-flex justify-content-center">
            <button class="text-decoration-none btn btn-dark mx-2 my-3" wire:click="getAll">ALL</button>
            @foreach($promos as $promo)
                @if($promo->id > 3 && $promo->id < 7)
                    <button class="text-decoration-none btn btn-dark mx-2 my-3" wire:click="getPromo({{ $promo->id }})">{{$promo->name}}</button>
                @endif
            @endforeach
        </div>
        <article class="row">
            @foreach($products as $product)
                <div class="col-12 col-md-4 card mb-4 border-0 p-0 ">
                    <img class="card-img-top px-2" src="{{$product->photo ? asset('/images/products/') . $product->photo->file : 'http://placehold.it/700x700'}}" alt="{{$product->name}}">
                    <div class="card-body test">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex flex-column border-0"><span class="fw-bold">Product:</span> {{$product->name}}</li>
                            <li class="list-group-item d-flex flex-column border-0"><span class="fw-bold">Description:</span> {{Str::limit($product->body, 300)}}</li>
                            <span class="d-flex align-items-center">
                            <li class="list-inline-item ms-3 me-0"><i class="fa fa-star text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                            <li class="list-inline-item me-0"><i class="fa fa-star text-secondary"></i></li>
                            <li class="list-group-item border-0">{{$product->reviews->count()}} Review(s)</li>
                        </span>
                            <li class="list-group-item border-0 fw-bold">&euro; {{$product->price}}</li>
                        </ul>
                    </div>
                    <div class="card-footer border-0">
                        @foreach($product->tags as $tag)
                            <p>TAGS:</p>
                            <h5 class="badge badge-pill badge-success border-0 "> {{$tag->name}}</h5>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </article>
    </div>
    <div class="row mb-lg-5">
        <div class="col-lg-2 offset-lg-5 d-flex justify-content-center">
            {{$products->links()}}
        </div>
    </div>
</section>
