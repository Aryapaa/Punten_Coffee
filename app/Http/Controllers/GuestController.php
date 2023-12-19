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

    public function menu(String $id){
        // Assuming $id represents the category_id
        $subcategories = Subcategory::where('category_id', $id)->get();
    
        // Assuming you want to retrieve items for the first subcategory (you can modify this logic based on your requirements)
        $firstSubcategory = $subcategories->first();
        $items = $firstSubcategory ? Item::where('subcategory_id', $firstSubcategory->id)->get() : collect();
    
        return view('pages.menus')->with('items', $items)->with('subcategories', $subcategories);
    }
    

    public function addReservation(Request $request){
        $data = $request->all();

        Reservations::create([

        ]);
    }
}