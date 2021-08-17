<div class="row">
    <div class="col-12 col-lg-8 offset-lg-2">
        <h2 class="text-center mt-lg-5">Get In Touch With Us</h2>
        <p class="text-center mb-lg-4">Quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia
            <br> voluptas sit aspernatur aut </p>
        <form class="row mb-0" name="contactformulier" action="{{action('App\Http\Controllers\ContactController@store')}}" method="post">
            @csrf
            <div  class="row">
                <div class="col-12 col-lg-4">
                    <input name="name" type="text" class="form-control my-1 shadow border-0" placeholder="Enter your name" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-12 col-lg-4">
                    <input name="email" type="text" class="form-control my-1 shadow border-0" placeholder="Your Email" aria-label="email" aria-describedby="basic-addon1">
                </div>
                <div class="col-12 col-lg-4">
                    <input name="subject" type="text" class="form-control my-1 shadow border-0" placeholder="Subject" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <textarea name="message" class="form-control textfield shadow border-0" placeholder="Your message here" aria-label="With textarea"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 offset-lg-4 d-flex justify-content-center mb-5">
                    <button type="submit" class="btnstyle btn-dark rounded text-uppercase mt-lg-4">Send to us</button>
                </div>
            </div>
        </form>
    </div>
</div>


