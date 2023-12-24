@extends('admin.template.app')
@section('title', 'Profil Saya')

@section('content')
<div class="card">

        <div class="card-body">
                {{-- flashdata --}}
        {!! session('sukses') !!}
        <h1 class="card-title fw-semibold mb-3 fs-6">Profil Saya</h1>


        <div class="card">
            <div class="card-body">

                <form action="/user/{{Auth::user()->id}}/profile" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method('PUT')
                    <!-- Tambahkan metode PUT untuk pembaruan data -->

                    <div class="col-md-6">
                        <!-- Kolom 1 -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"
                                placeholder="Nama Lengkap">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"
                                placeholder="Email">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                         <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                         
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>
@endsection
