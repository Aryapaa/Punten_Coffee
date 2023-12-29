<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
        public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function setting()
    { 
        return view('admin/setting/setting');
    }

    public function ubah_password(Request $request, $id)
    {
        $request->validate([
            'password_lama' => 'required|min:8',
            'password_baru' => 'required|min:8|confirmed',
            'password_baru_confirmation' => 'required|min:8',
        ]);

        $user = User::select('id','password')->whereId($id)->firstOrFail();
        if (Hash::check($request->password_lama, $user->password)) {
            $user->update(['password' => Hash::make($request->password_baru)]);

            $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');
            return redirect('/user/' . $id . '/setting');
        } else {
            return redirect()->back()->with('gagal', '<small class="text-danger">Password lama anda salah</small>');
        }

    }

    public function profile($id)
    {
        $user = User::select('*')->whereId($id)->firstOrFail();

        return view('admin/setting/profile', compact('user'));
    }

   public function ubah_profile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find($id);

        if (!$user) {
            // Handle the case where the user is not found, e.g., redirect back with an error message
            return redirect()->back()->with('error', 'User not found.');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $user->update($data);

        // Set flash message
        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');

        return redirect('/user/' . $id . '/profile');
    }
}
