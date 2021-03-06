<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\keyCategory;
use App\Models\Project;
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
        $keysUnique = Key::all();
        $keys = $keysUnique->unique(['project_id']);
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
        $projects = Project::pluck('name', 'id')
            ->all();
        return view('cms.keys.create', compact('categories', 'projects'));
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

        $key->project_id = $request->project_id;
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
        $key = Key::findOrFail($id);
        $key->delete();

        return redirect()->back();
    }

    public function search_item(request $request)
    {
        $search_text = $request->searchbar;
        $project = Project::where('name', 'LIKE', '%' .$search_text. '%')
            ->first();
        $key = Key::where('project_id', $project->id)->first();
        return view('admin.search.index_keys', compact('key'));
    }
}
