<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class BrandSelector extends Component
{
    public $brand = 0;
    public $brands;

    public function mount()
    {
        $this->brands = Brand::all();

    }

    public function allProductsBrands()
    {
        $this->brand = 0;
        $this->emit('updateProductsWithBrand', $this->brand);
    }

    public function productsPerBrand($id){
        $this->brand = Brand::where('id',$id)->pluck('id');
        $this->emit('updateProductsWithBrand', $this->brand);
    }

    public function render()
    {
        return view('livewire.brand-selector');
    }
}
