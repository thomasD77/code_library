<section class="col-12 col-lg-5 mt-5">
    <div class="row">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-dark">Your cart</span>
           <span class="badge badge-dark badge-pill">{{Session::has('cart') ? Session::get('cart')->totalQuantity : null}}</span>
        </h4>
        <ul class="list-group my-3">
            @foreach($cart as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed my-2 shadow">
                    <div class="row">
                        <div class="col-md-6 d-flex flex-column">
                            <h6 class="mt-5">{{$item['product_name']}}</h6>
                            <span class="text-muted my-2">{{Str::limit($item['product_description']), 150}}</span>
                            <span class="fw-bold my-2 py-3">Item Subtotal: &euro; {{$item['product_price']*$item['quantity']}}</span>
                            <div class="d-flex align-items-center">
                                @if(Session::has('coupon') == false)
                                    <span class="fw-bold me-3 my-2">Quantity:</span>
                                        <button class="btn btn-dark border-0 bg-dark" wire:click="quantityDown({{$item['product_id']}}, {{$item['quantity']}})"><i class="fas fa-sort-down p-0 text-white"></i></button>
                                        <p class="mx-2 my-0 fw-bold">{{$item['quantity']}}</p>
                                        <button class="btn btn-dark border-0 bg-dark" wire:click="quantityUp({{$item['product_id']}}, {{$item['quantity']}})"><i class="fas fa-sort-up p-0 text-white"></i></button>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column">
                            <div class="d-flex justify-content-end">
                                @if(Session::has('coupon') == false)
                                <button wire:click="removeItem({{ $item['product_id'] }})" class="bg-danger border-0 py-2 px-3 rounded m-2"><i class="far fa-trash-alt text-white"></i></button>
                                @endif
                            </div>
                            <div class="d-flex flex-column">
                                <img class="card-img-top img-thumbnail" src="{{$item['product_image'] ?
                                                asset('/images/products/' .  $item['product_image']) : "GEEN FOTO MOMENTEEL" }}"
                                     alt="{{$item['product_name']}}">
                                <span class="text-muted py-1">Unity Price: {{$item['product_price']}}</span>

                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
