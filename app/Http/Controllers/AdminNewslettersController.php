<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use App\Models\Photo;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminNewslettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newsletters = Newsletter::withTrashed()
            ->latest()
            ->with(['photo'])
            ->paginate(10);

        return view('admin.newsletters.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.newsletters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterRequest $request)
    {
        //
        $newsletter = new newsletter();
        $newsletter->title = $request->title;
        $newsletter->body = $request->body;

        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images/newsletters', $name);

            $photo = Photo::create(['file'=>$name]);
            $newsletter->photo_id = $photo->id;
        }

        $newsletter->save();
        return redirect('/admin/newsletters');
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
        $newsletter = Newsletter::findOrFail($id);
        return view ('admin.newsletters.show', compact('newsletter'));
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
        $newsletter = Newsletter::findOrFail($id);
        return view ('admin.newsletters.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsletterRequest $request, $id)
    {
        //
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->title = $request->title;
        $newsletter->body = $request->body;

        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images/newsletters', $name);

            $photo = Photo::create(['file'=>$name]);
            $newsletter->photo_id = $photo->id;
        }

        $newsletter->update();
        return redirect('/admin/newsletters');
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
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();
        Session::flash('newsletter_message', $newsletter->title . ' was deleted');
        return redirect('/admin/newsletters');
    }

    public function newsletterRestore($id)
    {
        Newsletter::onlyTrashed()->where('id', $id)->restore();
        Session::flash('newsletter_message',  'FAQ was restored');
        return redirect('/admin/newsletters');
    }

    public function newsletter_send_email(request $request)
    {
        $id = $request->newsletter_id;
        $records = Newsletter::findOrFail($id);
        $records->is_active = 1;
        $records->update();

        $image = $request->photo_file;

        $data = [
            'title' => $records->title,
            'body' => $records->body,
            'created_at' => $records->created_at,
            'updated_at' => $records->deleted_at,
            'image' => $image
        ];

        $readers = Reader::all();

        foreach ($readers as $reader){
            Mail::to($reader->email)->send(new NewsletterMail($data));
        }

        Session::flash('newsletter_send_message',   'The Newsletter was Send');
        return redirect('admin/newsletters');

    }
}
