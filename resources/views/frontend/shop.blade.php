@extends('layouts.frontend_template')
@section('content')

<main class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-10 offset-lg-1">
            <div class="row">
                <aside id="sidebar" class="col-12 col-lg-2">
                    @livewire('filter')
                    <div class="mt-5">
                        <p>To Buy Our Diving Gear you need to create an account.</p>
                        <p class="mb-1">Don't have an account yet? </p>
                        @if (Route::has('register'))
                            <a  href="{{ route('register') }}">{{ __('Register here!') }}</a>
                        @endif
                    </div>
                </aside>
                @livewire('cart')
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 offset-lg-4 d-flex justify-content-center mb-5">
            {{$products->links()}}
        </div>
    </div>
@stop
