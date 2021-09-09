<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\keyCategory;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $keys = Key::paginate(20);
        return view ('cms.keys.index', compact('keys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = keyCategory::pluck('name', 'id')
            ->all();
        return view('cms.keys.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $key = new Key();

        $key->name = $request->name;
        $key->url = $request->url;
        $key->email= $request->email;
        $key->login = $request->login;
        $key->password = $request->password;
        $key->subject_id = $request->subject_id;
        $key->save();


        return redirect('/admin/keys');
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
        $key = Key::findOrFail($id);
        return view('cms.keys.show', compact('key'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }

    public function search_item(request $request)
    {
        $search_text = $request->searchbar;
        $backends = Backend::where('description', 'LIKE', '%' .$search_text. '%')
            ->paginate(10);
        return view('admin.search.index_backend', compact('backends'));
    }
}
