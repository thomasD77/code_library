<div>
    <button wire:click="allProducts" class="w-100 fw-bold text-uppercase hover-scale my-3 shadow text-center list-group-item  text-decoration-none border-0 rounded">ALL</button>
    <h3 class="fw-bold p-2 categoriesstyle">ALL CATEGORIES</h3>
    <ul class="allcategories ps-0">
        @if($productcategories)
            @foreach($productcategories as $productcategory)
                <button wire:click="productsPerCategory({{$productcategory->id}})" class="w-100 fw-bold text-uppercase hover-scale my-3 shadow text-center list-group-item  text-decoration-none border-0 rounded">{{$productcategory->name}}</button>
            @endforeach
        @endif
    </ul>
    <h3 class="fw-bold p-2 categoriesstyle">ALL BRANDS</h3>
    <ul class="allcategories ps-0">
        @if($brands)
            @foreach($brands as $brand)
                <button wire:click="productsPerBrand({{$brand->id}})" class="w-100 fw-bold text-uppercase hover-scale my-3 shadow text-center list-group-item  text-decoration-none border-0 rounded">{{$brand->name}}</button>
            @endforeach
        @endif
    </ul>
    <div>
        <h3 class="p-2 mt-4 categoriesstyle fw-bold">PRICE FILTER</h3>
        <label for="customRange2" class="form-label">FROM</label>
        <div class="d-flex flex-column">
            <input wire:model="min_price" class="border-0 shadow rounded" type="number" name="min_price">
            <p class="my-2">TO</p>
            <input wire:model="max_price" class="border-0 shadow rounded" type="number" name="max_price">
        </div>
        <button wire:click="priceFilter" type="submit" class="btn btn-dark mt-4 "><i class="fas fa-filter"></i></button>
    </div>
</div>
