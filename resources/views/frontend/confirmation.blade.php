@extends('layouts.frontend_template')
@section('content')
    <section class="row">
        <div class="d-flex justify-content-center flex-column m-4">
            <img class="mx-auto" src="{{asset('images/frontend/thankyou.jpg')}}" alt="confirmaiton">
            <h3 class="m-3 text-center">Thank You for Buying! We are taking care of your order...</h3>
            <p class="text-center">Would you like to check your order(s). <a href="{{route('orders.index')}}">Click here</a></p>
        </div>
    </section>
@stop
