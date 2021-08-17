<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProductSubcategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.productsubcategories.create');
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
        $productsubcateogry = new ProductSubcategory();
        $productsubcateogry->name = $request->name;
        $productsubcateogry->description = $request->description;
        $productsubcateogry->save();
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
        $productsubcategory = ProductSubcategory::findOrFail($id);
        return view ('admin.productsubcategories.edit', compact('productsubcategory'));
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
        $productsubcateogry = ProductSubcategory::findOrFail($id);
        $input = $request->all();
        $productsubcateogry->update($input);
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
        $productsubcateogry = ProductSubcategory::findOrFail($id);
        $productsubcateogry->delete();
        Session::flash('productsubcategory_message', $productsubcateogry->name . ' was deleted');
        return redirect('/admin/productcategories');
    }

    public function productsubcategoryRestore($id)
    {
        $productsubcategory = ProductSubcategory::onlyTrashed()->findOrFail($id);
        ProductSubcategory::onlyTrashed()->where('id', $id)->restore();
        Session::flash('productsubcategory_message', $productsubcategory->name . ' was restored');
        return redirect('/admin/productcategories');
    }
}
