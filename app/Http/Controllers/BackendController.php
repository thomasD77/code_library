<?php

namespace App\Http\Controllers;

use App\Models\Backend;
use App\Models\Photo;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $backends = Backend::paginate(10);
        return view('cms.backend.index', compact('backends'));
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
        return view('cms.backend.create', compact('types'));
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

        $backend = new Backend();

        $backend->type_id = $request->type_id;
        $backend->description = $request->description;
        $backend->comment = $request->comment;
        $backend->notes = $request->notes;
        $backend->save();

        $photos = array();
        if($files = $request->file('photos')){
            foreach ($files as $file){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/backend', $name);
                $photos[] = Photo::create(['file'=>$name, 'backend_id'=>$backend->id]);
            }

        }

        return redirect('/admin/backend/');

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
        $backend = Backend::findOrFail($id);
        $types = Type::pluck('name', 'id')
            ->all();
        $photos = Photo::where('backend_id', $id)->get();
        return view('cms.backend.show', compact('types', 'backend', 'photos'));
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
        $backend = Backend::findOrFail($id);
        $types = Type::pluck('name', 'id')
            ->all();
        $photos = Photo::where('backend_id', $id)->get();
        return view('cms.backend.edit', compact('types', 'backend', 'photos'));
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
        $backend = Backend::findOrFail($id);

        $backend->type_id = $request->type_id;
        $backend->description = $request->description;
        $backend->comment = $request->comment;
        $backend->notes = $request->notes;
        $backend->update();

        $photos = array();
        if($files = $request->file('photos')){
            foreach ($files as $file){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/backend', $name);
                $photos[] = Photo::create(['file'=>$name, 'backend_id'=>$backend->id]);
            }
        }

        return redirect('/admin/backend/');
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
        $backend = Backend::findOrFail($id);
        $backend->delete();
        Session::flash('backend_message', $backend->type->name . ' was deleted');
        return redirect('/admin/backend');
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
        $backends = Backend::where('description', 'LIKE', '%' .$search_text. '%')
            ->paginate(10);
        return view('admin.search.index_backend', compact('backends'));
    }
}
