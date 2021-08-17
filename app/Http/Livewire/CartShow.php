<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartShow extends Component
{
    public $cartTotal;

    protected $listeners = ['updateCart'];

    public function updateCart($cartAmount)
    {
        $this->cartTotal = $cartAmount;
    }

    public function render()
    {
        $this->cartTotal = Session::has('cart') ? Session::get('cart')->totalQuantity : 0;
        return view('livewire.cart-show');
    }
}
