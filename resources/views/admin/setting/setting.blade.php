@extends('admin.template.app')
@section('title', 'Ubah Password')

@section('content')
    <div class="card-body">
        {{-- flashdata --}}
        {!! session('sukses') !!}
        <h1 class="card-title fw-semibold mb-3 fs-6">Ubah Password</h1>


        <div class="card">
            <div class="card-body">

                <form action="/user/{{Auth::user()->id}}/setting" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-3">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="password_lama" name="password_lama">
                        @error('password_lama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        {!! session('gagal') !!}
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_baru" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password_baru" name="password_baru">
                        @error('password_baru')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_baru_confirmation" class="form-label">Ulangi Password Baru</label>
                        <input type="password" class="form-control" id="password_baru_confirmation"
                            name="password_baru_confirmation">
                        @error('password_baru_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

            </div>
        </div>

    </div>
@endsection
