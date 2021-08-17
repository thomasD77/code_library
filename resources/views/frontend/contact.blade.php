@extends('layouts.frontend_template')
@section('content')

<main id="contact" class="container-fluid">
    <section id="contactformulier" class="mt-5">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                @include('admin.includes.form_error_close')
                @if(Session::has('contactform_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p class="alert-success">Thanks for your interest in our Company!</p>
                        <hr>
                        <p class="mb-0 alert-success">{{session('contactform')}}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidde="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        @include('frontend.includes.contactformulier')
    </section>

    <section id="credentials" class="row custom-margin">
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="row d-flex">
                <div class="col-12 col-lg-4 text-center">
                    <div class="d-flex justify-content-center mb-3"><img class="img-fluid" src="{{asset('images/frontend/adres.png')}}" alt="adres"></div>
                    <h4 class="mb-0">Kerkstraat 25</h4>
                    <h4>1000 Brussel</h4>
                </div>
                <div class="col-12 col-lg-4 text-center">
                    <div class="d-flex justify-content-center mb-3"><img class="img-fluid" src="{{asset('images/frontend/telefoon.png')}}" alt="telefoon"></div>
                    <h4 class="mb-0">+32 474 41 36 66</h4>
                </div>
                <div class="col-12 col-lg-4 text-center">
                    <div class="d-flex justify-content-center mb-3"><img class="img-fluid" src="{{asset('images/frontend/info.png')}}" alt="info"></div>
                    <h4 class="mb-0">info@divemaster.com</h4>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="pb-5 d-none d-md-block">
        <div id="app">
            <testimonial-component></testimonial-component>
        </div>
    </section>
@stop
