<div>
    <h3 class="fw-bold p-2 categoriesstyle">ALL CATEGORIES</h3>
    <ul class="allcategories ps-0">
        <button wire:click="allProducts" class="w-100 fw-bold text-uppercase hover-scale my-3 shadow text-center list-group-item  text-decoration-none border-0 rounded">ALL</button>
        @if($productcategories)
            @foreach($productcategories as $productcategory)
                <button wire:click="productsPerCategory({{$productcategory->id}})" class="w-100 fw-bold text-uppercase hover-scale my-3 shadow text-center list-group-item  text-decoration-none border-0 rounded">{{$productcategory->name}}</button>
            @endforeach
        @endif
    </ul>
</div>

