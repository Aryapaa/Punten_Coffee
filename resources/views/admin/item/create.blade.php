@extends('admin.template.app')
@section('title', 'Item')
@section('item', 'active')

@section('content')
<div class="card">

    <div class="card-body">
        <h1 class="card-title fw-semibold mb-3 fs-6">Tambah Data Item</h1>

        <div class="card">
            <div class="card-body">

                <form action="/item" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <!-- Kolom 1 -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Name makanan atau minuman...">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="price...">
                            @error('price')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Kolom 2 -->
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="stok...">
                            @error('stock')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subcategory_id" class="form-label">Sub Category</label>
                            <select class="form-select" name="subcategory_id" id="subcategory_id">
                                <option>Pilih Sub Catgeory</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- Tambahkan elemen formulir lainnya untuk kolom 2 sesuai kebutuhan -->

                    </div>
                    <div class="col-md-12">
                        <!-- Tombol submit di bagian bawah, span 12 kolom -->

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo Item</label>
                            <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required>
                            @error('photo')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/item" class="btn btn-danger">Kembali</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>
@endsection
