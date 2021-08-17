@extends('layouts.frontend_template')
@section('content')

<main class="container-fluid">
    <div id="app"></div>
    <section id="about" class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="row">
                <article class="col-12 col-lg-6 d-lg-flex flex-column justify-content-lg-center">
                    <h1 class="text-uppercase">WHO WE ARE</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis. </p>
                </article>
                <article id="fotobox" class="col-12 col-lg-6 d-lg-flex justify-content-lg-center" data-aos="fade-up"
                     data-aos-anchor-placement="top-center" data-aos-duration="2000">
                    <img id="duiker3" class="img-fluid" src="{{asset('images/frontend/aboutduiker.PNG')}}" alt="duiker">
                </article>
            </div>

            <section id="symbols" class="row custom-margin">
                <article class="col-12 col-lg-4 d-flex mt-3 mt-lg-0">
                    <img src="{{asset('images/frontend/delivery.png')}}" alt="delivery">
                    <div class="ms-3">
                        <h2 class="fw-bold">Ultra Fast Delivery</h2>
                        <p>Within 48 hours</p>
                    </div>
                </article>
                <article class="col-12 col-lg-4 d-flex my-3 my-lg-0">
                    <img src="{{asset('images/frontend/cash.png')}}" alt="cash">
                    <div class="ms-3">
                        <h2 class="fw-bold">Cash on Delivery</h2>
                        <p>All over the country</p>
                    </div>
                </article>
                <article class="col-12 col-lg-4 d-flex">
                    <img src="{{asset('images/frontend/world.png')}}" alt="world">
                    <div class="ms-3">
                        <h2 class="fw-bold">World Class Service</h2>
                        <p>500+ Satisfied Customers</p>
                    </div>
                </article>
            </section>
        </div>
    </section>

    <section class="row my-5">
        <div class="col-md-10 offset-md-1 d-flex justify-content-center">
            <img class="img-fluid mb-lg-5 w-75" src="{{asset('images/frontend/divingok.jpg')}}" alt="boot">
        </div>
    </section>

    <section id="FAQS" class="row custom-margin">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="accordion" id="accordionExample">
                    <h2 class="my-5">FAQS</h2>
                    @if($FAQS)
                    @foreach($FAQS as $FAQ)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="{{$FAQ->id}}">
                                <button class="accordion-button text-dark bg-light btn-outline-dark" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$FAQ->id}}" aria-expanded="true"
                                        aria-controls="collapse{{$FAQ->id}}">
                                    {{$FAQ->questions}}
                                </button>
                            </h2>
                            <div id="collapse{{$FAQ->id}}" class="accordion-collapse collapse "
                                 aria-labelledby="{{$FAQ->id}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{$FAQ->answers}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop
