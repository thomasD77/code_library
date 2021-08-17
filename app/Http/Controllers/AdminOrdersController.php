<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDate;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use PDF;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $orders = Order::withTrashed()
            ->with(['user', 'orderdetails', 'coupon'])
            ->where('finished', 0)
            ->latest()
            ->paginate(10);


        if($request->has('download'))
        {
            $pdf = PDF::loadView('admin.orders.pdf',compact('orders'))
                ->setPaper('A4', 'landscape');

            return $pdf->download('pdfview.pdf');
        }

        return view ('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.orders.create');
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
        $order = order::findOrFail($id);
        $orderID = $order->pluck('id');

        $orderdetails = Orderdetail::where('order_id', $orderID)->get();                        // Find all the orderdetails
        foreach($orderdetails as $orderdetail){
            $orderdetail->delete();                                                             // delete them when we delete this order
        }
        $order->delete();
        Session::flash('order_message', 'Order ID ' . $order->id . ' was deleted');
        return redirect('/admin/orders');
    }

    public function ordersRestore($id)
    {
        $orderdetails = Orderdetail::onlyTrashed()->get();
        foreach ($orderdetails as $orderdetail){
            $orderdetail->restore();
        }

        $order = Order::onlyTrashed()->findOrFail($id);
        order::onlyTrashed()->where('id', $id)->restore();
        Session::flash('order_message', 'Order ID ' . $order->name . ' was restored');
        return redirect('admin/orders');
    }

    public function Finish($id)
    {
        $Order = Order::findOrfail($id);                                            // Change status finish when this is clicked
        $Order->finished = 1;
        $Order->update();

        return redirect('admin/orders');
    }

    public function index_finished(Request $request)
    {
        //
        $orders = Order::withTrashed()
            ->with(['user', 'orderdetails', 'coupon'])
            ->where('finished', 1)
            ->latest()
            ->paginate(10);

        if($request->has('download'))
        {
            $pdf = PDF::loadView('admin.orders.pdf',compact('orders'))
                ->setPaper('A4', 'landscape');

            return $pdf->download('pdfview.pdf');
        }

        return view ('admin.orders.finished', compact('orders'));
    }

    public function OrderDate(Request $request)
    {
        $date = $request->date;
        $OrderDate = Carbon::parse($date);

        $orders = Order::withTrashed()
            ->with(['user', 'orderdetails', 'coupon'])                                  // Find all the order with:
            ->whereMonth('created_at', $OrderDate)                              // Request Month
            ->whereYear('created_at', $OrderDate)                               // Request Year
            ->where('finished', 0)
            ->latest()
            ->paginate(10);


        if($request->has('download'))
        {
            $pdf = PDF::loadView('admin.orders.pdf',compact('orders'))
                ->setPaper('A4', 'landscape');

            return $pdf->download('pdfview.pdf');
        }

        return view ('admin.orders.index', compact('orders'));
    }

    public function OrderDateFinished(Request $request)
    {
        $date = $request->date;
        $OrderDate = Carbon::parse($date);

        $orders = Order::withTrashed()
            ->with(['user', 'orderdetails', 'coupon'])
            ->whereMonth('created_at', $OrderDate)
            ->whereYear('created_at', $OrderDate)
            ->where('finished', 1)
            ->latest()
            ->paginate(10);


        if($request->has('download'))
        {
            $pdf = PDF::loadView('admin.orders.pdf',compact('orders'))
                ->setPaper('A4', 'landscape');

            return $pdf->download('pdfview.pdf');
        }

        return view ('admin.orders.finished', compact('orders'));
    }


    public function search_item(request $request)
    {
        $search_text = $request->searchbar;
        $orders = Order::with(['user', 'coupon'])
            ->where('token', 'LIKE', '%' .$search_text. '%')
            ->paginate(10);
        return view('admin.search.index_orders', compact('orders'));
    }

}
