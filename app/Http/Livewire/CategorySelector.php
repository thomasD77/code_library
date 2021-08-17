<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class CategorySelector extends Component
{
    public $productcategory = 0;
    public $productcategories;

    public function mount()
    {
        $this->productcategories = ProductCategory::all();

    }

    public function allProducts()
    {
        $this->productcategory = 0;
        $this->emit('updateProductsWithCategory', $this->productcategory);
    }

    public function productsPerCategory($id){
        $this->productcategory = ProductCategory::where('id', $id)
            ->pluck('id')
            ->first();
        $this->emit('updateProductsWithCategory', $this->productcategory);
    }


    public function render()
    {
        return view('livewire.category-selector');
    }
}
