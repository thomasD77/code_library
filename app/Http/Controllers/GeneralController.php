<?php

namespace App\Http\Controllers;

use App\Models\general;
use App\Models\Photo;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $generals = General::paginate(10);
        return view('cms.general.index', compact('generals'));
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
        return view('cms.general.create', compact('types'));
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

        $general = new general();

        $general->type_id = $request->type_id;
        $general->description = $request->description;
        $general->comment = $request->comment;
        $general->notes = $request->notes;
        $general->save();

        $photos = array();
        if($files = $request->file('photos')){
            foreach ($files as $file){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/general', $name);
                $photos[] = Photo::create(['file'=>$name, 'general_id'=>$general->id]);
            }

        }

        return redirect('/admin/general/');

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
        $general = General::findOrFail($id);
        $types = Type::pluck('name', 'id')
            ->all();
        $photos = Photo::where('general_id', $id)->get();
        return view('cms.general.show', compact('types', 'general', 'photos'));
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
        $general = General::findOrFail($id);
        $types = Type::pluck('name', 'id')
            ->all();
        $photos = Photo::where('general_id', $id)->get();
        return view('cms.general.edit', compact('types', 'general', 'photos'));
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
        $general = General::findOrFail($id);

        $general->type_id = $request->type_id;
        $general->description = $request->description;
        $general->comment = $request->comment;
        $general->notes = $request->notes;
        $general->update();

        $photos = array();
        if($files = $request->file('photos')){
            foreach ($files as $file){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/general', $name);
                $photos[] = Photo::create(['file'=>$name, 'general_id'=>$general->id]);
            }
        }

        return redirect('/admin/general/');
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
        $general = General::findOrFail($id);
        $general->delete();
        Session::flash('general_message', $general->type->name . ' was deleted');
        return redirect('/admin/general');
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
        $generals = General::where('notes', 'LIKE', '%' .$search_text. '%')
            ->paginate(10);
        return view('admin.search.index_general', compact('generals'));
    }
}
