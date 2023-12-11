<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class GuestController extends Controller
{
    // public function menu(){
    //     $item = Item::all();

    //     return view('pages/menu', compact('item'));
    // }
    public function beverages(){
        return view('pages.menu_beverages');
    }

    public function foods(){
        return view('pages.menu_foods');
    }

    public function index(){
        return view('home');
    }

    public function reservation(){
        return view('pages.reservation');
    }
}