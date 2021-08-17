@extends('layouts.admin_template')
@section('content')
    <div class="row">
        <div class="col-12 my-4">
            <h1><span class="badge badge-dark display-1 shadow w-100">Invoice Address</span></h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Street</th>
                    <th scope="col">Number</th>
                    <th scope="col">City</th>
                    <th scope="col">Postal code</th>
                    <th scope="col">Country</th>
                </tr>
                </thead>
                <tbody>
                @if($user->addresses)
                @foreach($user->addresses as $address)
                    <tr>
                        <td>{{$user->name ? $user->name : 'No Name' }}</td>
                        <td>{{$address->street ? $address->street : 'No Street'}}</td>
                        <td>{{$address->number ? $address->number : 'No Number'}}</td>
                        <td>{{$address->city ? $address->city : 'No City'}}</td>
                        <td>{{$address->postbox ? $address->postbox : 'No Postal Code'}}</td>
                        <td>{{$address->country ? $address->country : 'No Country'}}</td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="col-12 my-4">
            <h1><span class="badge badge-dark display-1 shadow w-100">Delivery Address</span></h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Street</th>
                    <th scope="col">Number</th>
                    <th scope="col">City</th>
                    <th scope="col">Postal code</th>
                    <th scope="col">Country</th>
                </tr>
                </thead>
                <tbody>
                    @if($deliver)
                    <tr>
                        <td>{{$deliver->name ? $deliver->name : 'No Name'}}</td>
                        <td>{{$deliver->street ? $deliver->street : 'No Street'}}</td>
                        <td>{{$deliver->number ? $deliver->number : 'No Number'}}</td>
                        <td>{{$deliver->city ? $deliver->city : 'No City'}}</td>
                        <td>{{$deliver->postbox ? $deliver->postbox : 'No Postal Code'}}</td>
                        <td>{{$deliver->country ? $deliver->country : 'No Country'}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

    <h1><span class="badge badge-dark display-1 shadow w-100 my-4">Orderdetails</span></h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Order ID</th>
            <th scope="col">Price</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($orderdetails)
            @foreach($orderdetails as $orderdetail)
                <tr>
                    <td>{{$orderdetail->id}}</td>
                    <td>{{$orderdetail->product ? $orderdetail->product->name : 'No Product'}}</td>
                    <td>{{$orderdetail->quantity ? $orderdetail->quantity : 'No quantity'}}</td>
                    <td>{{$orderdetail->order->id ? $orderdetail->id : 'No Order ID'}}</td>
                    <td>{{($orderdetail->product ? $orderdetail->price : 0 )*($orderdetail->quantity ? $orderdetail->quantity : 0)}}</td>
                    <td>{{$orderdetail->created_at->diffForHumans()}}</td>
                    <td>{{$orderdetail->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{$orderdetails->links()}}

    <div class="d-flex my-5">
        <div class="col-6">
            <h1><span class="badge badge-dark display-1 shadow w-100 mt-4 mb-0">Pricing</span></h1>
            <div class="card shadow ">
                <div class="d-flex justify-content-between align-items-center mx-4">
                    <h4 class="fw-bold mt-4">Total Price:</h4><h4 class="mt-4 fw-bold">&euro; {{$orderdetailSum}}</h4>
                </div>
                @if($orderdetail->order->coupon)
                <div class="row mx-4 mt-3 d-flex flex-column">
                    <div class="d-flex justify-content-between col-6">
                        <h5>Coupon Code:</h5><h5>{{$orderdetail->order->coupon ? $orderdetail->order->coupon->code : 'No Coupon Code'}}</h5>
                    </div>
                    <div class="d-flex justify-content-between col-6">
                        <h5>Discount:</h5><h5>{{$orderdetail->order->coupon ? $orderdetail->order->coupon->discount : 'No Coupon Discount'}}%</h5>
                    </div>
                    <div class="d-flex justify-content-between col-6">
                        <h5>Description:</h5><h5>{{$orderdetail->order->coupon ? $orderdetail->order->coupon->description : 'No Coupon Description'}}</h5>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mx-4 mb-4">
                    <h4 class="fw-bold mt-4">Order Price with Discount:</h4><h4 class="mt-4 fw-bold">&euro; {{$discountTotal}}</h4>
                </div>
                @endif
            </div>
        </div>
        <div class="col-6">
            <h1><span class="badge badge-dark display-1 shadow w-100 mt-4 mb-0">Notes</span></h1>
            <div class="card shadow">
                @if($deliver)
                <h4 class="my-5 pl-4">{{$deliver->remarque}}</h4>
                @endif
            </div>
        </div>
    </div>
@stop




