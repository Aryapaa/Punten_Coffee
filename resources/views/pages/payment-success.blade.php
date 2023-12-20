@extends('layouts.navbarorder')

@section('content')

<div class="card m-4 shadow p-2">
    
    <div class="card-body text-center">
        <div>
           <svg width="120" height="120" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                viewBox="0 0 50 50" xml:space="preserve">
            <circle style="fill:#25AE88;" cx="25" cy="25" r="25"/>
            <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points="
                38,15 22,33 12,25 "/>
            </svg>
        </div>

        <p class="mt-4 text-success h5">Transaksi Berasil</p>

    </div>
</div>

<div class=" text-center w-100 p-4">
    <a href="/order" class="btn text-white mb-4 w-100" style="background-color: #8B0C0C;" type="submit">Kembali Ke Halaman Order</a>
</div>

<script>
    localStorage.removeItem('cartData');
</script>

@endsection
