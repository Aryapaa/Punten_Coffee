@extends('layouts.navbarorder')

@section('content')
<h5 class="py-2 px-3">Jumlah Pesanan</h5>

<div class="card m-4 shadow p-2">
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

<input type="hidden" name="total_order" id="totalOrder" value="">
<input type="hidden" name="total_amount" id="totalAmount" value="">

<div class=" text-center p-4">
    <a href="./payment-success" class="btn text-white mb-4 mx-auto w-100" style="background-color: #8B0C0C;">Bayar</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var cartData = JSON.parse(localStorage.getItem('cartData')) || [];

        var subTotalPrice = 0;

        cartData.forEach(function(item) {
            var itemPrice = getItemPrice(item.itemId);
            subTotalPrice += (parseInt(item.quantity) * getItemPrice(item.itemId));
        });

        var ppnPrice = subTotalPrice * 0.1;

        var totalPrice = subTotalPrice + ppnPrice;

        document.getElementById('subTotalPrice').innerText = 'Rp ' + subTotalPrice;
        document.getElementById('ppnPrice').innerText = 'Rp ' + ppnPrice;
        document.getElementById('totalPrice').innerText = 'Rp ' + totalPrice;

        document.getElementById('totalOrder').value = subTotalPrice;
        document.getElementById('totalAmount').value = totalPrice;
    });

    function getItemPrice(itemId) {
        @foreach($items as $item)
        if ("{{ $item->id }}" == itemId) {
            return {
                {
                    $item - > price
                }
            };
        }
        @endforeach

        return 0;
    }
</script>


@endsection