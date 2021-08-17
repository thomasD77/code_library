<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartForm extends Component
{
    public $cartAmount;


    public function quantityUp($id, $quantity)
    {
        $newQuantity = $quantity + 1;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQuantity($id, $newQuantity);
        Session::put('cart', $cart);

        $this->cartAmount = Session::get('cart')->totalPrice;
        $this->emit('CartPriceTotal', $this->cartAmount);                   // Emit to TotalCartAmount

        $this->cartAmount = Session::get('cart')->totalQuantity;
        $this->emit('updateCart', $this->cartAmount);                       // Emit to CartShow

    }

    public function quantityDown($id, $quantity)
    {
        if($quantity > 1){
            $newQuantity = $quantity - 1;
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->updateQuantity($id, $newQuantity);
            Session::put('cart', $cart);

            $this->cartAmount = Session::get('cart')->totalPrice;
            $this->emit('CartPriceTotal', $this->cartAmount);

            $this->cartAmount = Session::get('cart')->totalQuantity;
            $this->emit('updateCart', $this->cartAmount);
        }

    }

    public function removeItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);

        $this->cartAmount = Session::get('cart')->totalPrice;
        $this->emit('CartPriceTotal', $this->cartAmount);

        $this->cartAmount = Session::get('cart')->totalQuantity;
        $this->emit('updateCart', $this->cartAmount);
    }


    public function render()
    {
        if(!Session::has('cart')){
            // return redirect('/');
            return view('frontend.home');
        }else{
            $currentCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($currentCart);
            $cart = $cart->products;
        }

        return view('livewire.cart-form', compact('cart'));
    }
}
