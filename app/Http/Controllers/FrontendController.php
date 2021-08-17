<?php

namespace App\Http\Controllers;

use App\Models\frontend;
use App\Models\Photo;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $frontends = Frontend::paginate(10);
        return view('cms.frontend.index', compact('frontends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Type::pluck('name', 'id')
            ->all();
        return view('cms.frontend.create', compact('types'));
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

        $frontend = new frontend();

        $frontend->type_id = $request->type_id;
        $frontend->description = $request->description;
        $frontend->comment = $request->comment;
        $frontend->notes = $request->notes;
        $frontend->save();

        $photos = array();
        if($files = $request->file('photos')){
            foreach ($files as $file){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/frontend', $name);
                $photos[] = Photo::create(['file'=>$name, 'frontend_id'=>$frontend->id]);
            }

        }

        return redirect('/admin/frontend/');

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
        $frontend = Frontend::findOrFail($id);
        $types = Type::pluck('name', 'id')
            ->all();
        $photos = Photo::where('frontend_id', $id)->get();
        return view('cms.frontend.show', compact('types', 'frontend', 'photos'));
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
        $frontend = Frontend::findOrFail($id);
        $types = Type::pluck('name', 'id')
            ->all();
        $photos = Photo::where('frontend_id', $id)->get();
        return view('cms.frontend.edit', compact('types', 'frontend', 'photos'));
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
        $frontend = Frontend::findOrFail($id);

        $frontend->type_id = $request->type_id;
        $frontend->description = $request->description;
        $frontend->comment = $request->comment;
        $frontend->notes = $request->notes;
        $frontend->update();

        $photos = array();
        if($files = $request->file('photos')){
            foreach ($files as $file){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/frontend', $name);
                $photos[] = Photo::create(['file'=>$name, 'frontend_id'=>$frontend->id]);
            }
        }

        return redirect('/admin/frontend/');
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
        $frontend = Frontend::findOrFail($id);
        $frontend->delete();
        Session::flash('frontend_message', $frontend->type->name . ' was deleted');
        return redirect('/admin/frontend');
    }

    public function destroyPhoto($id)
    {
        //
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return redirect()->back();
    }

    public function search_item(request $request)
    {
        $search_text = $request->searchbar;
        $frontends = Frontend::where('description', 'LIKE', '%' .$search_text. '%')
            ->paginate(10);
        return view('admin.search.index_frontend', compact('frontends'));
    }
}
