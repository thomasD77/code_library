@extends('layouts.frontend_template')
@section('content')

<main class="container-fluid" id="checkout">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="row me-4">
                        @include('admin.includes.form_error_close')
                    </div>
                    @if(Session::has('coupon'))
                        @if(Session::has('coupon_succes'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="alert-success">Discount from Coupon was succesfull</p>
                                <p>Btw, You can only Validate One Coupon per Order</p>
                                <hr>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidde="true">&times;</span>
                                </button>
                            </div>
                            <div class="card border-0 shadow p-3">
                                <span class="d-flex justify-content-between align-items-center"><h4>TOTAL PRICE:</h4><h5 class="me-5">&euro; {{Session::get('cart')->totalPrice}}</h5> </span>
                            </div>
                        @endif
                    @else
                    <section>
                        <div class="row">
                            @if(Session::has('coupon_error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <p class="alert-danger">Sorry! This is not a valid Coupon.</p>
                                    <hr>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidde="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <p class="mt-5">Do you have a Coupon code? Please enter your code here and get your discount!</p>
                            <form class="row mb-0" name="getcoupon" action="{{action('App\Http\Controllers\AdminCouponController@Coupon')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div>
                                        <input name="coupon" type="number" class="form-control my-2 shadow" placeholder="Your coupon code" aria-label="coupon" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center mb-5">
                                            <button type="submit" class="btnstyle btn-dark rounded text-uppercase mt-lg-4 fw-bold">Get my Discount</button>
                                        </div>
                                    </div>
                                    @livewire('total-cart-amount')
                                </div>
                            </form>
                        </div>
                    </section>
                    @endif

                    <section class="row mt-5">
                        <h2 class="my-3">Billing detail</h2>
                        <form class="row mb-0" name="contactformulier" action="{{action('App\Http\Controllers\MollieController@preparePayment')}}" method="post">
                            @csrf
                            <div  class="row">
                                <div>
                                    <input name="name" type="text" class="form-control my-2 shadow" placeholder="Enter your name" aria-label="name" aria-describedby="basic-addon1">
                                </div>
                                <div >
                                    <input name="street" type="text" class="form-control my-2 shadow" placeholder="Enter your street" aria-label="street" aria-describedby="basic-addon1">
                                </div>
                                <div class="col-md-6" >
                                    <input name="number" type="number" class="form-control my-2 shadow" placeholder="Your number" aria-label="number" aria-describedby="basic-addon1">
                                </div>
                                <div class="col-md-6">
                                    <input name="postbox" type="number" class="form-control my-2 shadow" placeholder="Your postbox" aria-label="postbox" aria-describedby="basic-addon1">
                                </div>
                                <div >
                                    <input name="city" type="text" class="form-control my-2 shadow" placeholder="Your city" aria-label="city" aria-describedby="basic-addon1">
                                </div>
                                <div >
                                    <input name="country" type="text" class="form-control my-2 shadow" placeholder="Your country" aria-label="country" aria-describedby="basic-addon1">
                                </div>
                                <div >
                                    <textarea name="remarque" type="text" placeholder="Something we need to know..." cols="30" rows="10" class="form-control my-2 shadow" aria-label="country" aria-describedby="basic-addon1"></textarea>
                                </div>
                                <div >
                                    <input name="user" type="hidden" class="form-control my-1" value="{{Auth::user()->id}}" aria-label="user" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center mb-5">
                                    <button type="submit" class="btnstyle btn-dark rounded text-uppercase mt-lg-4 fw-bold">Confirm Payment</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                @livewire('cart-form')
            </div>
        </div>
    </div>
@stop



