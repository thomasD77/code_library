<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = Review::with(['user', 'product', 'reviewreplies'])
            ->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
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
                'product_id'=>$request->product_id,
                'body'=>$request->body,
                'photo_id'=>$user->photo_id,
                'user_id'=>$user->id,
                'rating' => $request->rating,
            ];

            Review::create($data);
            Session::flash('review_message', 'Message submitted and awaits moderation!');
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
        Review::findOrFail($id)->update($request->all());
        return redirect ('/admin/reviews/');
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
        $review = Review::findOrFail($id);
        $reviewID = $review->pluck('id');

        $reviewreplies = ReviewReply::where('review_id', $reviewID)->get();
        foreach ($reviewreplies as $reviewreply){
            $reviewreply->delete();
        }
        $review->delete();
        Session::flash('review_message', 'Review from ' . $review->product->name . ' was deleted');
        return redirect()->back();
    }


    public function reviewRestore($id){
        $reviewreplies = ReviewReply::onlyTrashed()->get();
        foreach ($reviewreplies as $reviewreply){
            $reviewreply->restore();
        }

        $review = Review::onlyTrashed()->findOrFail($id);
        Review::onlyTrashed()->where('id', $id)->restore();
        Session::flash('review_message', 'Review from ' . $review->product->name . ' was restored');
        return redirect('admin/reviews');
    }


}
