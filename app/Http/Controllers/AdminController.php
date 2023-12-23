<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Subcategory;

class AdminController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = User::where('email', $request->email)->first();

        if ($email) {
            if ($request->password === $email->password) {
                // Password cocok, lakukan logika sesuai kebutuhan Anda di sini
                // Misalnya, atur sesi pengguna atau tindakan lainnya
                // Contoh:
                // session(['authenticated' => true]);
                return redirect('/dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Password is incorrect');
            }
        } else {
            return redirect()->route('login')->with('error', 'User not found');
        }
    }  

    public function showItems(){
        $subcategory = Subcategory::find(5);
        ($subcategory->items);
        return view('admin.menu_admin', compact('items', 'subcategory'));
    }

    public function showUser()
    {
        // $subcategory = ;
        return view('admin.user_admin', compact('user'));
    }
}