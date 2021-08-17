<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\ProductCategory;
use Livewire\Component;

class Filter extends Component
{
    public $productcategories;
    public $productcategory = [];

    public $brands;
    public $brand = [];

    public $min_price = [];
    public $max_price = [];


    public function mount()
    {
        $this->productcategories = ProductCategory::all();
        $this->brands = Brand::all();
    }

    public function allProducts()
    {
        $this->emit('allProducts');
    }

    public function productsPerBrand($id){
        $this->brand = Brand::where('id',$id)->pluck('id');
        $this->emit('updateProductsWithBrand', $this->brand);                   // Emit to Cart
    }

    public function productsPerCategory($id){
        $this->productcategory = ProductCategory::where('id', $id)
            ->pluck('id')
            ->first();
        $this->emit('updateProductsWithCategory', $this->productcategory);              // Emit to Cart
    }

    public function priceFilter()
    {
        $data = [
            'min_price' => $this->min_price,
            'max_price' => $this->max_price,
        ];

        $this->emit('min_price', $this->min_price);                                     // Emit to Cart
        $this->emit('max_price', $this->max_price);                                      // Emit to Cart

    }

    public function render()
    {
        return view('livewire.filter');
    }
}
