<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Subcategory;

class AdminController extends Controller
{
    //
    public function login(){

        return view('auth.login');
    }
    public function login_proses(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $data = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('error','email atau password salah');
        }
    }  

    public function showItems(){
        $subcategory = Subcategory::find(5);
        dd($subcategory->items);
        return view('admin.menu_admin', compact('items', 'subcategory'));
    }
}