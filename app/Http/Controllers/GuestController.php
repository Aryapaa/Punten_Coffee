<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Reservations;
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
        return view('pages.menus');
    }

    public function index(){
        return view('home');
    }

    public function reservation(){
        return view('pages.reservation');
    }

    public function menu($categoryId){
        $category = Category::find($categoryId);
        return view('pages/menus', compact('category'));
    }
    

    public function addReservation(Request $request){
        $data = $request->all();

        Reservations::create([

        ]);
    }
}