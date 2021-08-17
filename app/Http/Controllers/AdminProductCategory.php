<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminProductCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productcategories = ProductCategory::withTrashed()
            ->with(['productsubcategories', 'products'])
            ->paginate(10);
        $productsubcategories = ProductSubcategory::withTrashed()
            ->get();
        $products = Product::all();

        return view ('admin.productcategories.index', compact('productcategories', 'productsubcategories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.productcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        //
        $productcategory = new Productcategory();
        $productcategory->name = $request->name;
        $productcategory->description = $request->description;
        $productcategory['slug'] = Str::slug($request->name, '-');
        $productcategory->save();

        return redirect('/admin/productcategories');
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
        $productcategory = ProductCategory::findOrFail($id);
        $productsubcategories = ProductSubcategory::pluck('name', 'id')
            ->all();
        return view ('admin.productcategories.edit', compact('productcategory', 'productsubcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        //
        $productcategory = Productcategory::findOrFail($id);
        $input = $request->all();
        $productcategory['slug'] = Str::slug($request->name, '-');
        $productcategory->update($input);

        /**wegschrijven van de tussentabel**/
        $productcategory->productsubcategories()->sync($request->productsubcategories, true);

        return redirect ('/admin/productcategories');
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
        $productcategory = Productcategory::findOrFail($id);
        $productcategory->delete();
        Session::flash('productcategory_message', $productcategory->name . ' was deleted');

        return redirect('/admin/productcategories');
    }

    public function productcategoryRestore($id)
    {
        $productcategory = Productcategory::onlyTrashed()->findOrFail($id);
        Productcategory::onlyTrashed()->where('id', $id)->restore();
        Session::flash('productcategory_message', $productcategory->name . ' was restored');

        return redirect('/admin/productcategories');
    }
}
