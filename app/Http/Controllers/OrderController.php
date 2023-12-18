<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){
        $items = Item::all();

        return view('pages/ordermenu', compact('items'));
    }

    public function increaseQuantity(int $id){
        $items = Item::get($id);
        $qty = $items->qty + 1;
    }

    public function cart(){

        return view('pages/cart');
    }
}
