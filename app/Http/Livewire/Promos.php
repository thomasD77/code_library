<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Promo;
use Livewire\Component;
use Livewire\WithPagination;

class Promos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $promoID = 0;
    public $promos;

    public function mount()
    {
        $this->promos = Promo::all();
    }

    public function getPromo($id)
    {
        $this->promoID = $id;
    }

    public function getAll()
    {
        $this->promoID = 0;
    }

    public function render()
    {
        if($this->promoID == 0){
            $products = Product::with(['photo', 'reviews', 'tags'])
                ->paginate(3);
        }else{
            $products = Promo::findOrFail($this->promoID)
             ->products()
             ->with(['photo', 'user', 'tags', 'reviews'])
             ->paginate(3);
        }

        return view('livewire.promos', compact('products'));
    }

}
