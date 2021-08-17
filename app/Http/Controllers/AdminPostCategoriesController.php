<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCategoryRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPostCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $postcategories = PostCategory::withTrashed()
            ->paginate(10);
        return view('admin.postcategories.index', compact('postcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.postcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request)
    {
        //
        PostCategory::create($request->all());
        return redirect('/admin/postcategories');
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
        $postcategory = PostCategory::findOrFail($id);
        return view('admin.postcategories.edit', compact('postcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, $id)
    {
        //
        $postcategory = PostCategory::findOrFail($id);
        $postcategory->update($request->all());
        return redirect('admin/postcategories');
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
        $postCategory = PostCategory::findOrFail($id);
        $postCategory->delete();
        Session::flash('post_message', $postCategory->name . ' was deleted');

        return redirect('/admin/postcategories');
    }

    public function postsCategoryRestore($id)
    {
        $postCategory = PostCategory::onlyTrashed()
            ->findOrFail($id);
        PostCategory::onlyTrashed()
            ->where('id', $id);

        $postCategory->restore();
        Session::flash('post_message', $postCategory->name . ' was restored');

        return redirect('admin/postcategories');
    }
}
