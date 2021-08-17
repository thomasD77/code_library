<?php

namespace App\Http\Controllers;

use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminFAQSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $FAQS = FAQ::withTrashed()->paginate(10);
        return view ('admin.FAQS.index', compact('FAQS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.FAQS.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        //
        $FAQ = new FAQ();
        $FAQ->questions = $request->questions;
        $FAQ->answers = $request->answers;
        $FAQ->save();


        return redirect('admin/faqs');
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
        $FAQ = FAQ::findOrfail($id);
        return view('admin.faqs.edit', compact('FAQ'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request, $id)
    {
        //
        $FAQ = FAQ::findOrFail($id);
        $FAQ->questions = $request->questions;
        $FAQ->answers = $request->answers;
        $FAQ->update();

        return redirect('admin/faqs');
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
        $FAQ = FAQ::findOrFail($id);
        $FAQ->delete();
        Session::flash('faqs_message', 'FAQ was deleted');
        return redirect('/admin/faqs');
    }

    public function FAQRestore($id)
    {
        FAQ::onlyTrashed()->where('id', $id)->restore();
        Session::flash('faqs_message',  'FAQ was restored');
        return redirect('admin/faqs');
    }
}
