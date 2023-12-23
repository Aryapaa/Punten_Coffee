<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Subcategory;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user) {
            if ($request->password === $user->password) {
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
        $items = Item::all();
        return view('admin.menu_admin', compact('items'));
    }

    public function create_menu()
    {
        $subcategories = Subcategory::all();
        return view('admin.menu.create', compact('subcategories'));
    }

    public function create_user()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        //save ke database
        User::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('admin/user');
    }

    public function showUser()
    {
        $user = user::all();
        return view('admin.user_admin', compact('user'));
    }

    public function destroy(string $id)
    {
        $user->delete();

        return redirect('/admin/user'); 
    }

}