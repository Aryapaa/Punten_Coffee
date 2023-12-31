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
            'person' => 'required|numeric', 
        ]);

        $reservation = Reservation::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'person' => $request->input('person'),
        ]);

        return redirect('reservation')->with('status', 'Reservation has been added, please wait for our admin to contact you!');
    }



    public function menu($categoryId){
        $category = Category::find($categoryId);

        $cate = Category::all();
        return view('pages/menus', compact('category', 'cate'));
    }
    

    
}