@extends('layouts.frontend_template')
@section('content')

<main class="container-fluid">
    <div class="row" id="wenslijst">
        <section class="col-12 col-lg-8 offset-lg-2">
            @if($list)
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th scope="col">PHOTO</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">UNIT PRICE</th>
                    <th scope="col">ADD TO CART</th>
                    <th scope="col">REMOVE</th>
                </tr>
                </thead>
                    @foreach($list as $item)
                        <tbody class="my-5">
                        <tr class="">
                            <td><img class="card-img-top img-fluid w-50 img-thumbnail" src="{{$item['product_image'] ?
                                     asset('/images/products/' .  $item['product_image']) : "GEEN FOTO MOMENTEEL" }}"
                                     alt="{{$item['product_name']}}"></td>
                            <td>{{$item['product_name']}}</td>
                            <td>{{$item['product_price']}}</td>
                            <td><a class="btn btn-dark text-white btn-sm text-decoration-none pb-2 " href="{{route('addToCart', $item['product_id'])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart me-1" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                </a>
                            </td>
                            <td><a class="btn btn-danger btn-sm mb-2" href="{{route('removeItemList', $item['product_id'])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                @endif
            </table>
        </section>
    </div>
@stop

