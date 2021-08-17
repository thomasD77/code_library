@extends('layouts.frontend_template')
@section('content')

<main class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
            <section id="product" class="row">
                <article class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                    <img class="card-img-top w-75" src="{{$product->photo ? asset('/images/products/') . $product->photo->file : 'http://placehold.it/700x700'}}" alt="{{$product->name}}">
                </article>
                <article class="col-12 col-lg-6 mt-lg-5 pt-lg-4">
                    <h2>{{$product->name}}</h2>
                    <div class="d-flex align-items-center">
                        <ul class="list-inline me-2 mb-0">
                            @if($reviewStars == 1)
                            <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                            @elseif($reviewStars == 2)
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                            @elseif($reviewStars == 3)
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                            @elseif($reviewStars == 4)
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                            @elseif($reviewStars == 5)
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fa fa-star text-warning"></i></li>
                            @endif
                        </ul><span class="text-muted text-uppercase ">{{$reviews->total()}} Reviews</span>
                    </div>
                    <h3 class="mt-3">&euro; {{$product->price}}</h3>
                    <p class="my-3">{{$product->body}}</p>
                    <div class="d-flex align-items-center my-4">
                        <h6 class="text-uppercase pe-4  mb-0">Category</h6>
                        @if($product->productcategories)
                        @foreach($product->productcategories as $productcategory)
                            <p class="badge-pill badge-dark mx-2 text-center">{{ $productcategory->name }}</p>
                        @endforeach
                        @endif
                    </div>
<!--                    <div class="d-flex align-items-center my-4">
                        <h6 class="text-uppercase pe-4  mb-0">Tags</h6>
                        @if($product->tags)
                        @foreach($product->tags as $tag)
                            <span class="badge badge-pill mx-2 badge-dark">{{$tag->name}}</span>
                        @endforeach
                        @endif
                    </div>-->

                    @auth
                    <div class="d-flex align-items-center my-4">
                        <a class="btn btn-dark text-white btn-sm text-decoration-none pb-2 " href="{{route('addToCart', [$product->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart me-1" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                        </a>
                        <a class="btn btn-danger text-white btn-sm text-decoration-none pb-2 mx-2 " href="{{route('addToList', $product->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill " viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                        </a>
                    </div>
                    @endauth
                </article>
            </section>

            <section id="tabs" class="row">
                <div class="col-12 ">
                    <ul class="nav nav-pills mb-3 d-flex justify-content-around my-5" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link bg-dark text-white" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link bg-dark text-white" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tecnical Sheet</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="pills-tabContent">
                        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <p>{{$product->long_description}}</p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <p>{{$product->tec_sheet}}</p>
                        </div>
                    </div>
                </div>
            </section>

            {{--START REVIEWS--}}
            <section id="reviews" class="gazette-post-discussion-area section_padding_100 bg-gray">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10">
                            <!-- Comment Area Start -->
                            <div class="comment_area section_padding_50 clearfix">
                                <div class="">
                                    <h4 class="font-bold">Reviews</h4>
                                </div>
                                @if(Session::has('review_message'))
                                    <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
                                        <h4 class="alert-heading">Well done!</h4>
                                        <p class="alert-success">Thanks for your contribution to this Product!</p>
                                        <hr>
                                        <p class="mb-0 alert-success">{{session('review_message')}}</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidde="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <ol>
                                    <!-- Single Comment Area -->
                                    @if($reviews)
                                    @foreach($reviews as $review)
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper d-md-flex align-items-start my-5 bg-muted">
                                                <!-- Comment Meta -->
                                                <div class="comment-author mx-3">
                                                    <img class="rounded-circle" height="62" width="62" src="{{$review->user->photo ? asset('images/users') . $review->user->photo->file : 'http://placehold.it/62x62'}}" alt="{{$review->user->name}}">
                                                </div>
                                                <!-- Comment Content -->
                                                <div class="comment-content w-100">
                                                    <h5>{{$review->user ? $review->user->name : "Uknown"}}</h5>
                                                    <span class="comment-date font-pt mb-3">{{$review->created_at->diffForHumans()}}</span>
                                                    <h6 class="my-2">@if($review->rating == 1)
                                                            <i class="fa fa-star text-warning"></i>
                                                        @elseif($review->rating == 2)
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        @elseif($review->rating == 3)
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        @elseif($review->rating == 4)
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        @elseif($review->rating == 5)
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        @endif</h6>
                                                    <p>{{$review->body}}</p>

                                                    <article id="accordion" class="mt-md-5">
                                                        @if($userAllow == 1 )
                                                        <a class="btn btn-dark btn-sm" href="#"  aria-expanded="false"
                                                           data-toggle="collapse"
                                                           data-target="#collapse{{$review->id}}"
                                                           aria-controls="collapse{{$review->id}}">Reply <i class="fa fa-reply"></i>
                                                        </a>
                                                        <div id="collapse{{$review->id}}" class="pr-3 pt-3 collapse">
                                                                <form  action="{{action('App\Http\Controllers\AdminReviewRepliesController@store')}}"
                                                                       method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="review_id"
                                                                           value="{{$review->id}}">
                                                                    <div class="form-group">
                                                                    <textarea class="form-control text-white  bg-dark" name="body" id="message" cols="30" rows="10"
                                                                              placeholder="Message">
                                                                    </textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-dark btn-sm">SUBMIT
                                                                            <i class="fa fa-angle-right ml-2"></i>
                                                                    </button>
                                                                </form>
                                                        </div>
                                                        @endif
                                                    </article>
                                                </div>
                                            </div>

                                            <ol class="children ml-5">
                                                @if($review->reviewreplies)
                                                @foreach($review->reviewreplies as $reviewreply)
                                                    @if($reviewreply->is_active == 1)
                                                        <li class="single_comment_area my-5">
                                                            <div class="comment-wrapper d-md-flex align-items-start">
                                                                <!-- Comment Meta -->
                                                                <div class="comment-author mx-3">
                                                                    <img class="rounded-circle" height="62" width="62" src="{{$reviewreply->user->photo ? asset('images/users') . $reviewreply->user->photo->file : 'http://placehold.it/62x62'}}" alt="{{$reviewreply->review->user->name}}">
                                                                </div>
                                                                <!-- Comment Content -->
                                                                <div class="comment-content">
                                                                    <h5>{{$reviewreply->user->name}}</h5>
                                                                    <span class="comment-date text-muted">{{$reviewreply->created_at->diffForHumans()}}</span>
                                                                    <p class="mt-3">{{$reviewreply->body}}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                                @endif
                                            </ol>
                                        </li>
                                    @endforeach
                                    @endif
                                </ol>
                            </div>

                            <!-- Leave A Comment -->
                            @auth
                                @if($userAllow == 1 )
                                <article class="leave-comment-area clearfix mt-5">
                                    <div class="comment-form">
                                        <div class="">
                                            <hr>
                                            <h4 class="font-bold">Leave a Review</h4>
                                        </div>
                                        <!-- Comment Form -->
                                        <form action="{{action('App\Http\Controllers\AdminReviewsController@store')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <label class="form-label text-uppercase">Rating</label>
                                            <div class="input-group mb-3 w-25">
                                                <select class="form-select" name="rating">
                                                    <option selected></option>
                                                    <option class="ster bg-dark" value="1">*</option>
                                                    <option class="ster bg-dark" value="2">* *</option>
                                                    <option class="ster bg-dark" value="3">* * *</option>
                                                    <option class="ster bg-dark" value="4">* * * *</option>
                                                    <option class="ster bg-dark" value="5">* * * * *</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="body" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-dark my-2 ">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                                        </form>
                                    </div>
                                </article>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
        </section> {{--END REVIEUWS--}}
    </div>
@stop
