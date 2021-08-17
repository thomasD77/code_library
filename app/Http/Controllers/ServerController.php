<?php

namespace App\Http\Controllers;

use App\Models\server;
use App\Models\Photo;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servers = Server::paginate(10);
        return view('cms.server.index', compact('servers'));
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
        return view('cms.server.create', compact('types'));
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

        $server = new Server();

        $server->type_id = $request->type_id;
        $server->description = $request->description;
        $server->comment = $request->comment;
        $server->notes = $request->notes;
        $server->save();

        $photos = array();
        if($files = $request->file('photos')){
            foreach ($files as $file){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/server', $name);
                $photos[] = Photo::create(['file'=>$name, 'server_id'=>$server->id]);
            }

        }

        return redirect('/admin/server/');

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
        $server = Server::findOrFail($id);
        $types = Type::pluck('name', 'id')
            ->all();
        $photos = Photo::where('server_id', $id)->get();
        return view('cms.server.show', compact('types', 'server', 'photos'));
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
        $server = Server::findOrFail($id);
        $types = Type::pluck('name', 'id')
            ->all();
        $photos = Photo::where('server_id', $id)->get();
        return view('cms.server.edit', compact('types', 'server', 'photos'));
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
        $server = Server::findOrFail($id);

        $server->type_id = $request->type_id;
        $server->description = $request->description;
        $server->comment = $request->comment;
        $server->notes = $request->notes;
        $server->update();

        $photos = array();
        if($files = $request->file('photos')){
            foreach ($files as $file){
                $name = time(). $file->getClientOriginalName();
                $file->move('images/server', $name);
                $photos[] = Photo::create(['file'=>$name, 'server_id'=>$server->id]);
            }
        }

        return redirect('/admin/server/');
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
        $server = Server::findOrFail($id);
        $server->delete();
        Session::flash('server_message', $server->type->name . ' was deleted');
        return redirect('/admin/server');
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
        $servers = Server::where('description', 'LIKE', '%' .$search_text. '%')
            ->paginate(10);
        return view('admin.search.index_server', compact('servers'));
    }
}
