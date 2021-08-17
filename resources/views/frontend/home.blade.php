@extends('layouts.frontend_home_template')
@section('home')
<main class="container-fluid">
    @include('admin.includes.form_error_close')


    <section id="slider" class="row custom-margin py-4">
        <div class="col-md-8 offset-md-2 ">
            <div class="row">
            <div id="carouselExampleSlidesOnly" class="carousel slide my-md-5" data-bs-ride="carousel" data-innterval="100">
                <div class="carousel-inner">
                    @foreach($products as $product)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="d-lg-flex">
                                <div class="col-lg-6 ms-lg-5 d-flex justify-content-center flex-column">
                                    <h2 class="text-uppercase mt-lg-5 fa-3x">{{$product->name}}</h2>
                                    <p class="d-flex flex-column font-weight-bold my-2">Description: <span class="fw-normal">{{$product->body}}</span></p>
                                    <h2 class="text-larger">&euro; {{$product->price}}</h2>
                                    <br>
                                    <div>
                                        <a class="btn btn-dark rounded mt-lg-3 py-2 my-2" href="{{route('productpage', $product->slug)}}" data-aos="flip-up"  data-aos-duration="2000">SHOP NOW</a>
                                    </div>
                                </div>
                                <div class="image col-12 col-lg-6 d-flex justify-content-center px-0">
                                    <img class="img-fluid" class="px-0" src="{{$product->photo ? asset('/images/products/') ."/". $product->photo->file : 'http://placehold.it/700x700'}}" alt="{{$product->name}}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </section>

    <section id="populair" class="row my-3 custom-margin">
        <div class="col-12 col-lg-8 offset-lg-2">
            <h2 class="text-center text-uppercase">Popular Categories</h2>
            <div class="row">
                <article id="image1" class="col-12 col-lg-7 mt-5" data-aos="fade-right"  data-aos-duration="2000" >
                    <img class="img-fluid w-100 img-thumbnail" src="{{asset('images/frontend/duikgear.jpeg')}}" alt="duiker">
                    <p class="category_title badge badge-dark" >Swimming</p>
                </article>
                <div class="col-12 col-lg-5 d-flex flex-column justify-content-between mt-5" data-aos="fade-left"  data-aos-duration="2000">
                    <article id="image2" class="card cardborder">
                        <img class="img-fluid img-thumbnail" src="{{asset('images/frontend/femalediver.jpeg')}}" alt="duiker2">
                        <p class="category_title badge badge-dark">Snorkeling</p>
                    </article>
                    <article id="image3" class="card cardborder" data-aos="fade-left"  data-aos-duration="2000">
                        <img id="vissen" class="img-fluid img-thumbnail" src="{{asset('images/frontend/vissen.PNG')}}" alt="vissen">
                        <p class="category_title badge badge-dark">Diving</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    @livewire('promos')

    <section id="promo" class="row custom-margin">
        <div class="col-lg-8 offset-lg-2">
            <div class="row">
                <article class="col-lg-6 d-flex justify-content-center flex-column">
                    <h2 id="promotitle" class="text-uppercase text-dark pt-5">PROMO for Today</h2>
                    <h3 class="my-lg-4 text-uppercase">{{$promoToDay->name}}</h3>
                    <div class="d-flex">
                        <p id="promoprice"  class="ms-3 text-primary">&euro;
                        {{$promoToDay->price}}</p>
                    </div>
                    <p>{{$promoToDay->body}}</p>
                    <div>
                        <a class="btn btn-dark rounded mt-lg-3 py-2" href="{{route('productpage', $promoToDay->slug)}}" data-aos="flip-up"  data-aos-duration="2000">SHOP NOW</a>
                    </div>
                </article>
                <article class="col-12 col-lg-6 my-5 d-flex justify-content-center">
                    <img class="img-fluid w-75 mx-auto rounded-circle" src="{{$promoToDay->photo ? asset('/images/products/') . $promoToDay->photo->file : 'http://placehold.it/700x700'}}" alt="{{$promoToDay->name}}">
                </article>
            </div>
        </div>
    </section>


    <section id="trending" class="row custom-margin">
        <div class="col-lg-8 offset-lg-2">
            <div class="row">
                <h2 class="mt-5 mt-lg-5 mb-0 text-center text-uppercase my-5">Trending products</h2>
                @foreach($promotrends as $trend)
                    <article class="col-12 col-md-4">
                        <div class="card cardborder h-100 shadow" >
                            <img class="card-img-top" src="{{$trend->photo ? asset('/images/products/') . $trend->photo->file : 'http://placehold.it/700x700'}}" alt="{{$trend->name}}">
                            <div class="card-body cardborder px-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0">{{$trend->name}}</li>
                                    <li class="list-group-item border-0">{{Str::limit($trend->body, 300)}}</li>
                                    <li class="list-group-item border-0 text-muted">{{$trend->created_at->diffForHumans()}}</li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <a href="{{route('productpage', $trend->slug)}}" class=" btn btn-outline-dark text-dark text-white">Read More</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="anchor" class="d-none d-lg-block">
        <div id="app">
            <newsletter-component></newsletter-component>
        </div>
    </section>


    <section id="socials" class="row custom-margin">
        <h2 class="mt-5 text-center text-uppercase">OUR SOCIALS</h2>
        <p class="text-center">@divemaster_socials</p>
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="row my-5">
                <article class="col-12 col-lg-3 socialparent px-0 mx-0">
                    <img class="img-fluid" src="{{asset('images/frontend/animal.jpeg')}}" alt="animal"/>
                    <div class="social-content facebook">
                        <ul class="icon p-0 m-0">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.hln.be/&display=popup"><i class="fab fa-facebook"></i></a>
                                <p class="text-white">Share this</p></li>
                        </ul>
                    </div>
                </article>
                <article class="col-12 col-lg-3 socialparent px-0 mx-0">
                    <img class="img-fluid" src="{{asset('images/frontend/jumper.jpeg')}}" alt="animal"/>
                    <div class="social-content instagram">
                        <ul class="icon p-0 m-0">
                            <li><a href="https://www.instagram.com/?url=https://www.hln.be/" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                                <p class="text-white">Share this</p></li>
                        </ul>
                    </div>
                </article>
                <article class="col-12 col-lg-3 socialparent px-0 mx-0">
                    <img class="img-fluid" src="{{asset('images/frontend/diving.jpeg')}}" alt="animal"/>
                    <div class="social-content twitter">
                        <ul class="icon p-0 m-0">
                            <li><a href="https://twitter.com/share?url=https://www.hln.be/&text=title" rel="me" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                <p class="text-white">Share this</p></li>
                        </ul>
                    </div>
                </article>
                <article class="col-12 col-lg-3 socialparent px-0 mx-0">
                    <img class="img-fluid" src="{{asset('images/frontend/snorkel.jpeg')}}" alt="snorkel"/>
                    <div class="social-content youtube">
                        <ul class="icon p-0 m-0">
                            <li><a href="https://www.youtube.com" rel="me" target="_blank"><i class="fab fa-youtube"></i></a>
                                <p class="text-white">Share this</p></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </section>
@stop



