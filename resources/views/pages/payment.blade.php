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
    <button id="pay-button" class="btn text-white mb-4 mx-auto w-100" style="background-color: #8B0C0C;">Bayar</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                var saveEmail = JSON.parse(localStorage.getItem('saveEmail')) || []
                var dataToSave = {
                    order_id: result.order_id,
                    date: result.transaction_time,
                    jenis_pembayaran: result.payment_type,
                    nilai: result.gross_amount,
                    email: saveEmail,
                    status: result.transaction_status
                };
                $.ajax({
                    type: "POST",
                    url: "/payment-process-create",
                    data: dataToSave,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {

                        console.log(response.message);
                    },
                    error: function(error) {
                        console.error("Error: ", error)
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/payment-process-update/" + result.order_id,
                    data: {status_payment: "Paid"},
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {

                        console.log(response.message);
                    },
                    error: function(error) {
                        console.error("Error: ", error)
                    }
                })
                alert("payment success!");
                console.log(result)
                window.location.href = "{{ route('pages.paymentsuccess')}}";
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                var saveEmail = JSON.parse(localStorage.getItem('saveEmail')) || []
                var dataToSave = {
                    order_id: result.order_id,
                    date: result.transaction_time,
                    jenis_pembayaran: result.payment_type,
                    nilai: result.gross_amount,
                    email: saveEmail,
                    status: result.transaction_status
                };
                $.ajax({
                    type: "POST",
                    url: "/payment-process-create",
                    data: dataToSave,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {

                        console.log(response.message);
                    },
                    error: function(error) {
                        console.error("Error: ", error)
                    }
                });
                alert("payment failed!");
                console.log(result);
                location.reload();
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
                location.reload();
            }
        });
    });
</script>

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
            return "{{$item -> price}}";
        }
        @endforeach

        return 0;
    }
</script>


@endsection