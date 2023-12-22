@extends('layouts.navbarorder')

@section('content')
<h5 class="py-2 px-3">Pesanan Anda</h5>


<div id="cartItems">
    <!-- Cart items will be dynamically added here -->
</div>


<h5 class="py-2 px-3">Jumlah Pesanan</h5>

 <div class="card m-4 shadow">
        <div class="card-body ">
            <div class=" d-flex justify-content-between align-items-center">
                <span style="color: rgba(0, 0, 0, 0.51);">Sub Total :</span>
                <span style="color: #8B0C0C;" id="subTotalPrice">Rp 0</span>
            </div>
            <br>
            <div class=" d-flex justify-content-between align-items-center">
                <span style="color: rgba(0, 0, 0, 0.51);">PPN (10%) :</span>
                <span style="color: #8B0C0C;" id="ppnPrice">Rp 0</span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center pt-3">
            <h5 class="text-black font-bold">Total:</h5>
            <p style="color: #8B0C0C;" id="totalPrice">Rp 0</p>
        </div>
    </div>

<div class=" text-center">
    <a href="/payment" class="btn text-white mb-4 mx-auto" style="background-color: #8B0C0C;" type="submit">Konfirmasi
        Pembayaran</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        var cartData = JSON.parse(localStorage.getItem('cartData')) || [];
        var totalQuantity = 0;
        var totalPrice = 0;

        cartData.forEach(function (item) {
            totalQuantity += parseInt(item.quantity);

            totalPrice += (parseInt(item.quantity) * getItemPrice(item.itemId));

            var itemName = getItemName(item.itemId);

            var itemHtml = `
                    <div class="card m-4 shadow">
                        <div class="card-header d-flex justify-content-between">
                            <h6>${item.quantity} Items</h6>
                            <h6 class="" style="color: #8B0C0C;">Rp. ${parseInt(item.quantity) * getItemPrice(item.itemId)}</h6>
                        </div>
                        <div class="card-body d-flex align-items-center">
                            <img src="/asset/front-end/img/${getItemPhoto(item.itemId)}" class="rounded img-fluid w-25" alt="${getItemName(item.itemId)}"
                                style="aspect-ratio: 1 / 1; object-fit: cover; height: 100%">
                            <p class="m-2">${getItemName(item.itemId)}</p>
                        </div>
                    </div>
                `;

            document.getElementById('cartItems').innerHTML += itemHtml;
        });

        document.getElementById('totalQuantity').innerText = totalQuantity + ' Quantity';
        document.getElementById('totalPrice').innerText = 'Rp. ' + totalPrice;
    });

    function getItemPrice(itemId) {
             @foreach($items as $item)
                if ("{{ $item->id }}" == itemId) {
                    return {{ $item->price }};
                }
            @endforeach

            return 0;
        }

         function getItemName(itemId) {
            @foreach($items as $item)
                if ("{{ $item->id }}" == itemId) {
                    return "{{ $item->name }}";
                }
            @endforeach
            return "Item Not Found";
        }

         function getItemPhoto(itemId) {
            @foreach($items as $item)
                if ("{{ $item->id }}" == itemId) {
                    return "{{ $item->photo }}";
                }
            @endforeach
            return "Photo Not Found";
        }
</script>

 <script>
        document.addEventListener('DOMContentLoaded', function () {
        var cartData = JSON.parse(localStorage.getItem('cartData')) || [];

        var subTotalPrice = 0;

        cartData.forEach(function (item) {
            var itemPrice = getItemPrice(item.itemId);
            subTotalPrice += (parseInt(item.quantity) * getItemPrice(item.itemId));
        });

        var ppnPrice = subTotalPrice * 0.1;

        var totalPrice = subTotalPrice + ppnPrice;

        document.getElementById('subTotalPrice').innerText = 'Rp ' + subTotalPrice;
        document.getElementById('ppnPrice').innerText = 'Rp ' + ppnPrice;
        document.getElementById('totalPrice').innerText = 'Rp ' + totalPrice;
    });

    function getItemPrice(itemId) {
        @foreach($items as $item)
            if ("{{ $item->id }}" == itemId) {
                    return {{ $item->price }};
            }
        @endforeach

        return 0;
    }
</script>

@endsection
