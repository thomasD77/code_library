<?php

namespace App\Models;

use App\Http\Requests\DeliverRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderInput extends Model
{
    use HasFactory;

    public function orderCreate(Request $request)
    {
        $customer = Auth::user();
        $newOrder = new Order();
        $newOrder->user_id = $customer->id;
        if(Session::has('coupon')){
            $newOrder->coupon_id = Session::get('coupon')->id;
            Session::forget('coupon');
        }
        $newOrder->save();

        $products = Session::has('cart') ? Session::get('cart')->products : null;;
        foreach ($products as $item){
            $orderdetail = new Orderdetail();
            $orderdetail->order_id = $newOrder->id;
            $orderdetail->product_id = $item['product_id'];
            $orderdetail->quantity = $item['quantity'];
            $orderdetail->price =$item['product_price'];
            $orderdetail->save();
        }

        $request->validate([
            'name' => 'required',
            'street' => 'required',
            'number' => 'required',
            'postbox' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);


        $DeliveryAddress = new Deliver();
        $DeliveryAddress->user_id = Auth::user()->id;
        $DeliveryAddress->name = $request->name;
        $DeliveryAddress->street = $request->street;
        $DeliveryAddress->number = $request->number;
        $DeliveryAddress->postbox = $request->postbox;
        $DeliveryAddress->city = $request->city;
        $DeliveryAddress->country = $request->country;
        $DeliveryAddress->remarque = $request->remarque;
        $DeliveryAddress->save();

    }
}
