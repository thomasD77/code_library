<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminReviewRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviewreplies = ReviewReply::with(['review', 'user', ])
            ->paginate(10);
        return view ('admin.reviewreplies.index', compact('reviewreplies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if(Auth::user()){
            $user = Auth::user();
            //
            $data =[
                'review_id'=>$request->review_id,
                'body'=>$request->body,
                'photo_id'=>$user->photo_id,
                'user_id'=>$user->id,
            ];

            ReviewReply::create($data);
            Session::flash('reviewreply_message', 'Message submitted and awaits moderation!');
        }
        return redirect()->back();
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
        ReviewReply::findOrFail($id)
            ->update($request
                ->all());

        return redirect ('/admin/reviewreplies/');
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
        $reviewreply = ReviewReply::findOrFail($id);
        $reviewreply->delete();
        Session::flash('reviewreply_message', 'Review Reply was deleted');
        return redirect()->back();
    }

    public function reviewreplyRestore($id){
        ReviewReply::onlyTrashed()->where('id', $id)->restore();
        Session::flash('reviewreply_message', 'Review was restored');
        return redirect('admin/reviewreplies');
    }

}
