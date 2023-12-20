<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $items = Item::all();

        return view('pages/ordermenu', compact('items'));
    }

    public function increaseQuantity($id)
    {
        $items = Order::instance('order')->get($id);
        $qty = $items->qty + 1;
        Order::instance('order')->update($id, $qty);
    }

    public function decreaseQuantity($id)
    {
        $items = Order::instance('order')->get($id);
        $qty = $items->qty - 1;
        Order::instance('order')->update($id, $qty);
    }

    public function cart()
    {

        return view('pages/cart');
    }

    public function checkout(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 20000,
            ),
            'customer_details' => array(
                'name' => 'budi',
                'email' => 'budi.pra@example.com'
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('pages/checkout', compact('snapToken'));
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        dd($request);
        // if($hashed == $request->signature_key){
        //     if($request->trasaction_status == 'capture'){

        //     }
        // }
    }
}
