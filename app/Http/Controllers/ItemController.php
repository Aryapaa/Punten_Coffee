<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::latest()->get();
        return view('admin/item/index', compact('item'));
    }

    public function create()
    {
        $subcategories = Subcategory::all();
        return view('admin/item/create', compact('subcategories'));
    }

     public function store(Request $request)
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

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');

        return redirect('/item');
    }

     public function edit(string $id)
    {
        $subcategories = Subcategory::all();
        $item = Item::select('*')->whereId($id)->firstOrFail();
        return view('admin/item/edit', compact('item','subcategories'));
    }

    public function update(Request $request, string $id)
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

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');

        return redirect('/item');
    }

    public function destroy(string $id)
    {
        $item = Item::select('photo', 'id')->whereId($id)->first();
        File::delete('asset/front-end/img/' . $item->photo);
        $item->delete();

        request()->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/item');
    }
}
