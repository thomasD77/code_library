<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{
    public $cartAmount;
    public $cartTotal;

    public $productcategory = [];
    public $brand = [];

    public $min_price = [];
    public $max_price = [];

    protected $listeners = [
                            'updateProductsWithCategory',
                            'updateProductsWithBrand',
                            'allProducts',
                            'min_price',
                            'max_price'
                            ];


    public function min_price($id)
    {
        $this->reset(['brand']);
        $this->reset(['productcategory']);
        $this->min_price = $id;
    }

    public function max_price($id)
    {
        $this->max_price = $id;
    }

    public function allProducts()
    {
        $this->reset(['min_price']);
        $this->reset(['max_price']);
        $this->reset(['brand']);
        $this->reset(['productcategory']);
    }

    public function updateProductsWithCategory($id)
    {
        $this->reset(['min_price']);
        $this->reset(['max_price']);
        $this->reset(['brand']);
        $this->productcategory = $id;
    }

    public function updateProductsWithBrand($id)
    {
        $this->reset(['min_price']);
        $this->reset(['max_price']);
        $this->reset(['productcategory']);
        $this->brand = $id;
    }

    public function addToCart($id){
        $product = Product::with(['productcategories', 'brand', 'photo','tags'])
            ->where('id', '=', $id)
            ->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new \App\Models\Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        $this->cartAmount = Session::get('cart')->totalQuantity;
        $this->emit('updateCart', $this->cartAmount);                           // Emit to Cart-Show //  nav-bar.blade
    }

    public function render()
    {
        if($this->productcategory != [])
        {
            $productcategory = ProductCategory::findOrFail($this->productcategory);
            $products = $productcategory->products()
                ->with(['photo', 'user', 'tags', 'promos', 'brand', 'productcategories', 'reviews'])
                ->paginate(10);
            return view('livewire.cart', compact('products'));

        }
        elseif($this->brand != [])
        {
            $products = Product::with(['photo', 'user', 'brand', 'tags', 'productcategories', 'reviews'])
                ->where('brand_id', $this->brand)
                ->paginate(6);
            return view('livewire.cart', compact('products'));
        }
        elseif($this->min_price && $this->max_price != [])
        {
            $products = Product::whereBetween('price', [$this->min_price, $this->max_price])
                ->with(['productcategories', 'brand', 'photo','user', 'reviews'])
                ->orderBy('price', 'desc')
                ->paginate(10);
            return view('livewire.cart', compact('products'));
        }else{
            $products = Product::with(['brand', 'photo', 'user', 'productcategories', 'reviews'])
                ->paginate(6);
            return view('livewire.cart', compact('products'));
        }

    }

}
