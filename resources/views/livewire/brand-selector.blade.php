<div>
    <h3 class="fw-bold p-2 categoriesstyle">ALL BRANDS</h3>
    <ul class="allcategories ps-0">
        @if($brands)
            @foreach($brands as $brand)
                <button wire:click="productsPerBrand({{$brand->id}})" class="w-100 fw-bold text-uppercase hover-scale my-3 shadow text-center list-group-item  text-decoration-none border-0 rounded">{{$brand->name}}</button>
            @endforeach
        @endif
    </ul>
</div>


