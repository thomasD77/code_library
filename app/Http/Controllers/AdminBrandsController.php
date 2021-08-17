<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandsRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::withTrashed()->paginate(10);
        return view ('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandsRequest $request)
    {
        //
        $brand = new brand();
        $brand->name = $request->name;
        $brand->description = $request->description;

        $brand['slug'] = Str::slug($request->name, '-');
        $brand->save();
        return redirect('/admin/brands');
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
        $brand = brand::findOrFail($id);
        return view ('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandsRequest $request, $id)
    {
        //
        $brand = brand::findOrFail($id);
        $input = $request->all();
        $brand['slug'] = Str::slug($request->name, '-');
        $brand->update($input);
        return redirect ('/admin/brands');
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
        $brand = Brand::findOrFail($id);
        $brand->delete();
        Session::flash('brand_message', $brand->name . ' was deleted');
        return redirect('/admin/brands');
    }

    public function brandRestore($id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);
        Brand::onlyTrashed()->where('id', $id)->restore();
        Session::flash('brand_message', $brand->name . ' was restored');
        return redirect('/admin/brands');
    }
}
