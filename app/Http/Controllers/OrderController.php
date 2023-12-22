<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Subcategory;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function order($id_sub_cat = NULL){

        $subcategory = Subcategory::all();

        $subcatid = Subcategory::find($id_sub_cat);

        if($id_sub_cat != NULL){
            $items = Item::where('subcategory_id', $id_sub_cat)->get();
        } else {
            $items = Item::all();
        }

        return view('pages/ordermenu', compact('items','subcategory', 'subcatid'));
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
        $items = Item::all();
        return view('pages/cart', ['items' => $items,]);
    }

    public function payment()
    {
        $items = Item::all();
        return view('pages/payment', ['items' => $items,]);
    }

        public function paymentProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'total_order' => 'required',
            'total_amount' => 'required',
            'payment_method' => 'required',
        ]);

         $orderNumber = 'ORD' . rand(1000, 9999);

        $order =  Order::create([
            'email' => $request->email,
            'name' => $request->name,
            'total_order' => $request->total_order,
            'total_amount' => $request->total_amount,
            'payment_method' => $request->payment_method,
            'order_number' => $orderNumber,
        ]);

        $cartItems = $request->input('cartItems');

        

            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'item_id' => $item['item_id'],
                    'item_name' => $item['item_name'],
                    'item_price' => $item['item_price'],
                    'qty' => $item['qty'],
                    'order_id' =>$order->id
                ]);

                // Update stock in the items table
                $itemModel = Item::find($item['item_id']); // Replace Item with your actual model
                $itemModel->update([
                    'stock' => $itemModel->stock - $item['qty'],
                ]);
            }

           if ($request->payment_method === 'qris') {
                return redirect('/qris/' . $request->total_amount);
            } else {
                return redirect('/payment-success/');
            }
    }

    public function qris($totalAmount)
    {
        $totalAmount;
        return view('pages.qris', compact('totalAmount'));
    }


    public function paymentSuccess()
    {
        return view('pages/payment-success');
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
