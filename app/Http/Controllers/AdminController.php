<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Subcategory;
use App\Models\Reservation;
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
                return redirect()->route('home')->with('error', 'Password is incorrect');
            }
        } else {
            return redirect()->route('home')->with('error', 'User not found');
        }
    }  

    public function showReservations(){
        $reservation = Reservation::all();
        return view('admin.reserv.reserve_adm', compact('reservation'));
    }

    public function update_reservations(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'person(s)' => 'required|numeric', 
        ]);

        $data_update = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'date' => $request->date,
            'time' => $request->time,
            //'person(s)' => $request->person,
        ];

        $reservation = Reservation::select('id')->whereId($id)->first();

        $reservation->update($data_update);

        return redirect('/admin/reserv/reserve_adm');
    }

    public function edit_reservation(string $id)
    {
        $reservation = Reservation::select('*')->whereId($id)->firstOrFail();
        return view('admin.reserv.update_reservation', compact('reservation'));
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

    public function store_menu(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'subcategory_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('asset/front-end/img', $photo);
        
        //save ke database
        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'subcategory_id' => $request->subcategory_id,
            'photo' => $photo,
        ]);

        return redirect('/admin/menu');
    }

    public function edit_menu(string $id)
    {
        $items = Item::select('*')->whereId($id)->firstOrFail();
        $subcategories = Subcategory::all();
        return view('admin.menu.update', compact('items', 'subcategories'));
    }

    public function update_menu(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'subcategory_id' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'subcategory_id' => $request->subcategory_id,
        ];

        $item = Item::select('photo', 'id')->whereId($id)->first();
        if ($request->photo) {
            File::delete('asset/front-end/img/' .$item->photo);

            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('asset/front-end/img', $photo);

            $data['photo'] = $photo;
        }

        $item->update($data);

        return redirect('/admin/menu');
    }

    public function destroy_menu(string $id)
    {
        $item = Item::select('id')->whereId($id)->first();
        $item->delete();

        return redirect('/admin/menu'); 
    }

    public function delete_reservation($id) {
        $rese = Reservation::select('id')->whereId($id)->first();
        $rese->delete();

        // $notification = array(
        //     'message' => 'Deleted Successfully',
        //     'alert-type' => 'info'
        // );

        return redirect('/admin/reserv/reserve_adm');
    }
}