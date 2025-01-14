<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Subcategory;
use App\Models\Reservation;
use Illuminate\Support\Facades\File;
use App\Models\Order;

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

        $user = User::where('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($request->password === $user->password) {
                // Password cocok, lakukan logika sesuai kebutuhan Anda di sini
                // Misalnya, atur sesi pengguna atau tindakan lainnya
                // Contoh:
                // session(['authenticated' => true]);
                return redirect('/admin/user');
            } else {
                return redirect()->route('login')->with('error', 'Password is incorrect');
            }
        } else {
            return redirect()->route('login')->with('error', 'User not found');
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
            'person' => 'required|numeric', 
        ]);

        $data_update = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'person' => $request->input('person'),
        ];

        $reservation = Reservation::select('id')->whereId($id)->first();

        $reservation->update($data_update);

        return redirect('/admin/reserve_adm')->with('status', 'Reservation has been updated');
    }

    public function edit_reservation(string $id)
    {
        $reservation = Reservation::select('*')->whereId($id)->firstOrFail();
        return view('admin.reserv.update_reservation', compact('reservation'));
    }

    public function delete_reservation(string $id)
    {
        $reservation = Reservation::select('id')->whereId($id)->first();
        $reservation->delete();

        return redirect('/admin/reserve_adm'); 
    }


    public function showItems(Request $request){
        $katakunci = $request->katakunci;
        $jumlahbaris = 20;
        if(strlen($katakunci)){
            $items = Item::where('name', 'like', "%$katakunci%")
                        ->orWhere('subcategory_id', 'like', "%$katakunci%")
                        ->paginate($jumlahbaris);

        }else{
            $items = Item::paginate($jumlahbaris);
        }
            return view('admin.menu_admin', compact('items'));

    }

    public function create_menu()
    {
        $subcategories = Subcategory::all();
        return view('admin/menu/create', compact('subcategories'));
    }

     public function store_menu(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'subcategory_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('asset/front-end/img', $photo);

        // Simpan data ke database
        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'subcategory_id' => $request->subcategory_id,
            'photo' => $photo,
        ]);
       
        return redirect('/admin/menu')->with('success', 'Item added successfully!');
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

        return redirect('/admin/menu')->with('success', 'Item updated successfully!');
    }

    public function destroy_menu(string $id)
    {
        $item = Item::select('id')->whereId($id)->first();
        $item->delete();

        return redirect('/admin/menu')->with('success', 'Item deleted successfully!'); 
    }

    //user
    public function create_user()
    {
        return view('admin.user.create');
    }
    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        //save ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('admin/user');
    }

    public function showUser()
    {
        $user = User::all();
        return view('admin.user_admin', compact('user'));
    }

    public function destroy_user(string $id)
    {
        $user = User::select('id')->whereId($id)->first();
        $user->delete();

        return redirect('/admin/user'); 
    }

    public function edit_user($id)
    {
        $user = user::find($id);
        return view('admin.user.update', compact('user'));
    }

    // Update user data
    public function update_user(Request $request, $id)
    {
    $request->validate([
        'name'=> 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::find($id);
    
            $user ->name = $request->name;
            $user ->email = $request->email;
            $user ->password = bcrypt($request->password);
            $user ->save();
    
        return redirect('/admin/user')->with('success', 'User successfully updated');
    }

    public function showPayments(){
        $payments = Payment::all();

        return view('admin.payment_admin', compact('payments'));
    }

    public function edit_payment($id)
    {
        $payments = Payment::find($id);
        return view('admin.payment.update', compact('payments'));
    }

    public function update_payment(Request $request, $id)
    {
    $request->validate([
        'date' => 'required',
        'order_id' => 'required',
        'jenis_pembayaran' => 'required',
        'nilai' => 'required|numeric',
        'email' => 'required|email'
    ]);
    
        $data = [
            'date' => $request->date,
            'order_id' => $request->order_id,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'nilai' => $request->nilai,
            'email' => $request->email,
        ];
        
    $payments = Payment::find($id);

    $payments->update($data);
    
        return redirect('/admin/payment')->with('success', 'Transaction successfully updated');
    }

    public function destroy_payment(string $id)
    {
        $payments = Payment::select('id')->whereId($id)->first();
        $payments->delete();

        return redirect('/admin/payment')->with('success', 'Transaction successfully deleted!'); 
    }
    
    // fungsi order
    public function show_order(){
        $order = Order::all();
        return view('admin.order_admin', compact('order'));
    }

    public function edit_order(string $id)
    {
        $order = Order::select('*')->whereId($id)->firstOrFail();
        return view('admin.order.update', compact('order'));
    }

    public function update_order(Request $request, $id)
    {
        $request->validate([
            'order_number' => 'required',
            'email' => 'required',
            'name' => 'required',
            'total_order' => 'required',
            'total_amount' => 'required',
            'status_payment' => 'required',
            
        ]);

        $data = [
            'order_number' => $request->order_number,
            'email' => $request->email,
            'name' => $request->name,
            'total_order' => $request->total_order,
            'total_amount' => $request->total_amount,
            'status_payment' => $request->status_payment,
        ];

        $order = Order::select('id')->whereId($id)->first();

        $order->update($data);

        return redirect('/admin/order')->with('success', 'Order berhasil diupdate!');
    }

    public function destroy_order(string $id)
    {
        $order = Order::select('id')->whereId($id)->first();
        $order->delete();

        return redirect('/admin/order')->with('success', 'Item berhasil dihapus!'); 
    }

    
}


    
