@extends('layouts.navbarorder')

@section('content')
<hr>
<div class="d-flex justify-content-between m-4">
    <h6 class="">Total Pembayaran</h6>
    <h6 class="" style="color: #8B0C0C;">{{ $totalAmount }}</h6>
</div>
<hr>

<div class="card m-4 shadow p-2">
    <div class="card-header d-flex align-items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M3 11V3H11V11H3ZM5 9H9V5H5V9ZM3 21V13H11V21H3ZM5 19H9V15H5V19ZM13 11V3H21V11H13ZM15 9H19V5H15V9ZM19 21V19H21V21H19ZM13 15V13H15V15H13ZM15 17V15H17V17H15ZM13 19V17H15V19H13ZM15 21V19H17V21H15ZM17 19V17H19V19H17ZM17 15V13H19V15H17ZM19 17V15H21V17H19Z"
                fill="black" fill-opacity="0.6" />
        </svg>
        <span style="width: 4px;"></span>
        <p class="mt-3">QRIS</p>
    </div>
    <div class="card-body text-center">
        <div>
            <svg width="229" height="213" viewBox="0 0 229 213" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M150.281 139.781H186.062V173.062H150.281V139.781ZM121.656 113.156H150.281V139.781H121.656V113.156ZM186.062 173.062H214.688V199.688H186.062V173.062ZM193.219 113.156H214.688V133.125H193.219V113.156ZM121.656 179.719H143.125V199.688H121.656V179.719ZM150.281 39.9375H186.062V73.2188H150.281V39.9375Z"
                    fill="black" />
                <path
                    d="M214.688 99.8438H121.656V13.3125H214.688V99.8438ZM141.336 81.5391H195.008V31.6172H141.336V81.5391ZM42.9375 39.9375H78.7188V73.2188H42.9375V39.9375Z"
                    fill="black" />
                <path
                    d="M107.344 99.8438H14.3125V13.3125H107.344V99.8438ZM33.9922 81.5391H87.6641V31.6172H33.9922V81.5391ZM42.9375 139.781H78.7188V173.062H42.9375V139.781Z"
                    fill="black" />
                <path
                    d="M107.344 199.688H14.3125V113.156H107.344V199.688ZM33.9922 181.383H87.6641V131.461H33.9922V181.383Z"
                    fill="black" />
            </svg>
        </div>

        <small class="mt-4" style="color: #8B0C0C;">Silahkan scan barcode di atas</small>

    </div>
</div>

<div class=" text-center w-100 p-4">
    <a href="/payment-success" class="btn text-white mb-4 w-100" style="background-color: #8B0C0C;" type="submit">Ok</a>
</div>

<script>
    localStorage.removeItem('cartData');

</script>

@endsection
