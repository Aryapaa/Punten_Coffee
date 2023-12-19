<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){
        $items = Item::all();

        return view('pages/ordermenu', compact('items'));
    }

    public function increaseQuantity($id){
        $items = Order::instance('order')->get($id);
        $qty = $items->qty + 1;
        Order::instance('order')->update($id, $qty);
    }

    public function decreaseQuantity($id){
        $items = Order::instance('order')->get($id);
        $qty = $items->qty - 1;
        Order::instance('order')->update($id, $qty);
    }

    public function cart(){

        return view('pages/cart');
    }
}
