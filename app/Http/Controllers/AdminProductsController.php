<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCrudRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Promo;
use App\Models\Review;
use App\Models\ReviewReply;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades;
use Image;



class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        $productcategories = ProductCategory::all();
        $products = Product::withTrashed()
            ->with(['photo', 'user', 'brand', 'tags', 'productcategories', 'promos'])
            ->latest()
            ->sortable('id', 'name')->paginate(10);

        return view('admin.products.index', compact('products', 'brands', 'productcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands= Brand::pluck('name', 'id')
            ->all();
        $users = User::pluck('name', 'id')
            ->all();
        $productcategories = ProductCategory::pluck('name', 'id')
            ->all();
        $promos = Promo::pluck('name', 'id')
            ->all();
        $tags = Tag::pluck('name','id')
            ->all();

        return view('admin.products.create', compact('brands', 'productcategories', 'tags', 'users', 'promos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCrudRequest $request)
    {
        //
        $input = $request->all();


        /*if($file = $request->file('photo_id')){
            // Image FILE
            $name = time().$file->getClientOriginalName();          // Hier halen we de originele naam van de file
            $file->move('images/products', $name);          // Hier slaan we hem op in onze map Products

            // Image SMALL
            $path =  'images/products/' . $name;
            $imageSmall = Image::make($path);
            $imageSmall->resize(50,50);
            $imageSmall->save('images/products/' . 'SMALL' . $name);

            // Image CUSTOM
            $path =  'images/products/' . $name;
            $imageCustom = Image::make($path);
            $imageCustom->resize(250,350);
            $imageCustom->save('images/products/' . 'PRODUCT' . $name);

            $photo = Photo::create(['file'=>$name, 'small'=>$imageSmall->basename, 'custom'=>$imageCustom->basename]);
            $input['photo_id'] = $photo->id;

        }*/

        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images/products', $name);

            // Image Resize
            $path =  'images/products/' . $name;
            $image = Image::make($path);
            $image->resize(450,450);
            $image->save('images/products/' . $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['slug'] = Str::slug($request->name, '-');
        $product = Product::create($input);

        /*$tags = $request->tag_id;

        foreach($tags as $tag){
            $tagfind = Tag::findOrFail($tag);
            $product->tags()->save($tagfind);
        }*/

        /**wegschrijven van de tussentabel**/
        $product->productcategories()->sync($request->productcategories, false);
        $product->promos()->sync($request->promo_id, false);

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::findOrFail($id);

        return view ('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $brands= Brand::pluck('name', 'id')
            ->all();
        $productcategories = ProductCategory::pluck('name', 'id')
            ->all();
        $tags = Tag::pluck('name','id')
            ->all();
        $promos = Promo::pluck('name', 'id')
            ->all();

        return view('admin.products.edit', compact('brands', 'productcategories', 'product', 'tags', 'promos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCrudRequest $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $product['slug'] = Str::slug($request->name, '-');
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images/products', $name);

            // Image Resize
            $path =  'images/products/' . $name;
            $image = Image::make($path);
            $image->resize(450,450);
            $image->save('images/products/' . $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $product->update($input);

        $product->productcategories()->sync($request->productcategories, true);
        /*$product->tags()->sync($request->tags, true);*/
        $product->promos()->sync($request->promo_id, true);

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);

        $reviews = Review::where('product_id', $product->id)->get();

        foreach ($reviews as $review){
            $reviewReplies = ReviewReply::where('review_id', $review->id)->get();
            if($reviewReplies != ""){
                foreach ($reviewReplies as $reviewReply){
                    $reviewReply->delete();
                }
            }
            $review->delete();
        }


        $product->delete();
        Session::flash('product_message', $product->name . ' was deleted');

        return redirect('/admin/products');
    }

    public function productRestore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        Product::onlyTrashed()->where('id', $id)->restore();
        Session::flash('product_message', $product->name . ' was restored');

        return redirect('admin/products');
    }

    public function productsPerBrand($id){
        $productcategories = ProductCategory::paginate(10);
        $brands = Brand::paginate(10);
        $products = Product::where('brand_id', $id)
            ->with(['photo', 'user', 'brand', 'tags', 'productcategories'])
            ->paginate(10);

        return view('admin.products.index', compact('brands', 'products', 'productcategories'));
    }

    public function productsPerCategory($id)
    {
        $products = ProductCategory::findOrFail($id)->products()
            ->with(['photo', 'user', 'tags', 'promos', 'brand', 'productcategories'])
            ->paginate(10);
        $productcategories = ProductCategory::paginate(10);
        $brands = Brand::paginate(10);

        return view('admin.products.index', compact('brands', 'products', 'productcategories'));
    }

    public function search_item(request $request)
    {
        $search_text = $request->searchbar;
        $products = Product::with(['promos', 'photo', 'brand', 'productcategories', 'tags'])
            ->where('name', 'LIKE', '%' .$search_text. '%')
            ->paginate(10);
        return view('admin.search.index_products', compact('products'));
    }

}
