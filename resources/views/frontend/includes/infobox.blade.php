<section class="gegevens row pt-5">
    <div class="col-12 col-lg-8 offset-lg-2">
        <div class="row">
            <div class="col-12 col-xl-3 mb-5">
                <h2 class="text-uppercase mb-4">DIVESHOP</h2>
                <p>Email: info@divemaster.be</p>
                <p>Phone:  +948 256 347 968</p>
                <p>Subscribe to our newsleter and stay
                    up to date with latest offers and
                    upcoming trends.</p>
               @livewire('email')
            </div>
            <div class="col-12 col-xl-3">
                <h3 class="mb-4">About Us</h3>
                <a class="nav-link p-0 mx-2 tex" href="{{route('about')}}#about"><p>Who We Are</p></a>
                <a class="nav-link p-0 mx-2 tex" href="{{route('contact')}}#app"><p>Testimonials</p></a>
                <a class="nav-link p-0 mx-2 tex" href="{{route('home')}}#socials"><p>Social Media</p></a>
            </div>
            <div class="col-12 col-xl-3">
                <h3 class="mb-4">Help and Support</h3>
                <a class="nav-link p-0 mx-2 tex" href="{{route('contact')}}#contactformulier"><p>Contact Form</p></a>
                <a class="nav-link p-0 mx-2 tex" href="{{route('home')}}#anchor"><p>Newsletter</p></a>
                <a class="nav-link p-0 mx-2 tex" href="{{route('about')}}#FAQS"><p>FAQS</p></a>
            </div>
            <div class="col-12 col-xl-3">
                <h3 class="mb-4">Pages & Resources</h3>
                <a class="nav-link p-0 mx-2 tex" href="{{route('shop')}}"><p>Shop</p></a>
                <a class="nav-link p-0 mx-2 tex" href="{{route('about')}}"><p>About</p></a>
                <a class="nav-link p-0 mx-2 tex" href="{{route('contact')}}"><p>Contact</p></a>
                <a class="nav-link p-0 mx-2 tex" href="{{route('blog')}}"><p>Blog</p></a>
            </div>
        </div>
    </div>
</section>
</main>
