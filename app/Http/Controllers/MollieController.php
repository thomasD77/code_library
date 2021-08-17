<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderInput;
use App\Models\OrderToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mollie\Laravel\Facades\Mollie;


class MollieController extends Controller
{
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment(Request $request)
    {
        $OrderInput = new OrderInput();
        $OrderInput->orderCreate($request);

        $price = Session::get('cart')->totalPrice;
        $totalPrice = number_format($price, 2, ".", "");
        Session::forget('cart');


        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' => strval($totalPrice), // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Payment for Divemaster',
            'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        $order = Order::latest()->first();
        $order->token = $payment->id;
        $order->save();


        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess() {
        return view('frontend.confirmation');
    }
}
