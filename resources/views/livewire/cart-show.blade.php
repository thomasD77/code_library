@if(!Session::has('cart'))
    <a class="d-none d-sm-block" href="{{route('home')}}">
   <span class="badge badge-dark shadow my-2 mx-2 p-2">
    <svg xmlns="http://www.w3.org/2000/svg"
         width="16" height="16"
         fill="currentColor"
         class="bi bi-cart me-1"
         viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg> {{Session::has('cart') ? Session::get('cart')->totalQuantity : 0}}
</span>
    </a>
@else
    <a class="d-none d-sm-block" href="{{route('checkout')}}">
   <span class="badge badge-dark shadow my-2 mx-2 p-2">
    <svg xmlns="http://www.w3.org/2000/svg"
         width="16" height="16"
         fill="currentColor"
         class="bi bi-cart me-1"
         viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg> {{Session::has('cart') ? Session::get('cart')->totalQuantity : 0}}
</span>
    </a>
@endif








