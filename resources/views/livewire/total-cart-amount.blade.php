<div class="card border-0 shadow p-3">
    <span class="d-flex justify-content-between align-items-center"><h4>TOTAL PRICE:</h4>
        @if(Session::has('cart') ? Session::get('cart')->totalQuantity == 0 : null )
            <p class="fw-bold">0</p>
        @else
        <h5 class="me-5 fw-bold">&euro; {{Session::has('cart') ? Session::get('cart')->totalPrice : null}}</h5>
        @endif
    </span>
</div>
