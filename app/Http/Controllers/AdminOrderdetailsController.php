<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminOrderdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orderdetails = Orderdetail::withTrashed()
            ->with(['order', 'product'])
            ->latest()
            ->paginate(10);

        return view ('admin.orderdetails.index', compact('orderdetails'));
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
        $discountTotal = "";
        $orderdetails = Orderdetail::withTrashed()                                  // find orderdetails from this order
            ->with(['product', 'order'])
            ->where('order_id', $id)
            ->paginate(10);

        $userID = Order::findOrFail($id)->user_id;
        $user = User::findOrFail($userID);
        $deliver = $user->delivers()->latest()->first();                           // Find delivery address from user from this order

        $orderdetailSum = 0;                                                        // Make sum ammount orderdetails
        foreach ($orderdetails as $orderdetail){
            $orderdetailSum += ($orderdetail->price*$orderdetail->quantity);
        }

        foreach ($orderdetails as $orderdetail){                                    // find coupon trough orderdetail->order
            $coupon = $orderdetail->order->coupon;
         }

        if($coupon){
            $toolOne = $orderdetailSum / 100;                                               // 60 / 100 = 0.6
            $toolTwo = $toolOne * $coupon->discount;                                        // 0.6 * 40 = 24
            $discountTotal = $orderdetailSum - $toolTwo;                                   // 60 - 24 = 36
        }

        return view ('admin.orderdetails.show', compact('orderdetails', 'user', 'deliver', 'orderdetailSum', 'discountTotal'));
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
        $orderdetail = Orderdetail::findOrFail($id);
        $orderdetail->delete();
        Session::flash('orderdetail_message', 'Orderdetail ID ' . $orderdetail->id . ' was deleted');
        return redirect('/admin/orderdetails');
    }

    public function orderdetailsRestore($id)
    {
        $orderdetail = Orderdetail::onlyTrashed()->findOrFail($id);
        Orderdetail::onlyTrashed()->where('id', $id)->restore();
        Session::flash('orderdetail_message', 'Orderdetail ID ' . $orderdetail->name . ' was restored');
        return redirect('admin/orderdetails');
    }
}
