<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Reservation;
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

    public function create_reservations()
    {
        return view('pages.reservation');
    }

    public function store_reservation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'person(s)' => 'required|numeric', 
        ]);

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'date' => $request->date,
            'time' => $request->time,
            //'person(s)' => $request->person,
        ]);

        return redirect('/reserv/reservation');
    }



    public function menu($categoryId){
        $category = Category::find($categoryId);
        return view('pages/menus', compact('category'));
    }
    

    
}