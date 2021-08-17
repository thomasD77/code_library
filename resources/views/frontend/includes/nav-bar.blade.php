<body>
<header class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-md pe-0">
            <div class="col-12 col-lg-10 offset-lg-1 d-md-flex align-items-center px-0">
                <a class="navbar-brand ps-0 ps-lg-3 me-0 me-lg-4 py-0" id="logotitle">DIVEMASTER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-3 ms-lg-0 d-lg-flex justify-content-lg-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a aria-current="page" class="nav-link active pb-1" href="{{route('home')}}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-1 mx-2" href="{{route('shop')}}">SHOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-1 mx-2" href="{{route('about')}}">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-1 mx-2" href="{{route('contact')}}">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-1 mx-2" href="{{route('blog')}}">BLOG</a>
                        </li>
                    </ul>
                </div>
                @auth()
                <div id="tools" class="d-flex justify-content-center">
                    @livewire('cart-show')
                    <a class="d-none d-sm-block" href="{{route('wishlist')}}">
                        <span class="badge badge-danger shadow my-2 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="16" height="16"
                                 fill="currentColor"
                                 class="bi bi-heart-fill me-1"
                                 viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>{{Session::has('list') ? Session::get('list')->totalQuantity: '0'}}
                        </span>
                    </a>
                    </div>
                    @endauth
            </div>
        </nav>
    </div>
    <div class="row my-3 my-lg-5 pb-3 pb-lg-5">
        <div class="col-12 col-lg-8 offset-lg-2">
            <h1><span class="text-uppercase me-2">{{Route::currentRouteName()}}</span></h1>
            <div class="d-flex">
                <p><a class="atags pe-2" href="{{route('home')}}">Home</a></p>
                <p>|</p>
                <p><a class="atags ps-2" href=""></a> {{$name = Route::currentRouteName()}}</p>
            </div>
        </div>
    </div>
</header>

