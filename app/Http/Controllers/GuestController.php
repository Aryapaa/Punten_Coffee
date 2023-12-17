<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Subcategory;

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

    public function menu(){
        $subcategories = Subcategory::where('category_id', 2)->get();
        $items = Item::where('subcategory_id', 5)->get();
        return view('pages/foods')->with('items', $items)->with('subcategories', $subcategories);
    }
}