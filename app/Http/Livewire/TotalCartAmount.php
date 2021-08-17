<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class TotalCartAmount extends Component
{
    public $cartTotal;


    protected $listeners = ['CartPriceTotal'];

    public function CartPriceTotal($cartAmount)
    {
        $this->cartTotal = $cartAmount;
        Session::has('cart') ? Session::get('cart')->totalPrice = $this->cartTotal : 0;

    }

    public function render()
    {
        return view('livewire.total-cart-amount');
    }
}
