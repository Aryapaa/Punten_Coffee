@extends('layouts.navbarorder')

@section('content')
<h5 class="py-2 px-3">Metode Pembayaran</h5>
<form action="/payment-process" method="POST">
    @csrf
    <div class="card m-4 shadow p-2">
        <div class="card-body">
            <div class="div d-flex justify-content-between align-items-center">
                <div class="dflex">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z" fill="#4A4545" fill-opacity="0.83"/>
                    <path d="M17.526 5.116L14.347 0.659L2.658 9.997L2.01 9.99V10H1.5V22H22.5V10H21.538L19.624 4.401L17.526 5.116ZM19.425 10H9.397L16.866 7.454L18.388 6.967L19.425 10ZM15.55 5.79L7.84 8.418L13.946 3.54L15.55 5.79ZM3.5 18.169V13.829C3.9219 13.6795 4.30511 13.4377 4.6217 13.1213C4.93828 12.8049 5.18027 12.4218 5.33 12H18.67C18.8197 12.422 19.0616 12.8052 19.3782 13.1218C19.6948 13.4384 20.078 13.6803 20.5 13.83V18.17C20.078 18.3197 19.6948 18.5616 19.3782 18.8782C19.0616 19.1948 18.8197 19.578 18.67 20H5.332C5.18218 19.5777 4.93996 19.1941 4.62302 18.8774C4.30607 18.5606 3.9224 18.3186 3.5 18.169Z" fill="#4A4545" fill-opacity="0.83"/>
                    </svg>
                    <span>Cash</span>
                </div>
                <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="cash">
            </div>
            <div class="div d-flex justify-content-between align-items-center mt-2">
                <div class="dflex">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 11V3H11V11H3ZM5 9H9V5H5V9ZM3 21V13H11V21H3ZM5 19H9V15H5V19ZM13 11V3H21V11H13ZM15 9H19V5H15V9ZM19 21V19H21V21H19ZM13 15V13H15V15H13ZM15 17V15H17V17H15ZM13 19V17H15V19H13ZM15 21V19H17V21H15ZM17 19V17H19V19H17ZM17 15V13H19V15H17ZM19 17V15H21V17H19Z" fill="black" fill-opacity="0.6"/>
                    </svg>
                    <span>QRIS</span>
                </div>
                <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="qris">
            </div>
        </div>
    </div>

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

    <div class="form-group m-4 mb-4">
        <label for="name">Masukkan Nama :</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nama anda">
    </div>

      <div class="form-group m-4 mb-4">
        <label for="email">Masukkan Email :</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="your@mail.com">
    </div>

    <div class=" text-center p-4">
        <button class="btn text-white mb-4 mx-auto w-100" style="background-color: #8B0C0C;" type="submit">Bayar</button>
    </div>

    <div class="card-body" id="cartItems">
    </div>

</form>

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
                <input class="form-control" type="hidden" name="cartItems[${item.itemId}][item_id]" value="${item.itemId}">
                <input class="form-control" type="hidden" name="cartItems[${item.itemId}][item_name]" value="${getItemName(item.itemId)}">
                <input class="form-control" type="hidden" name="cartItems[${item.itemId}][item_price]" value="${getItemPrice(item.itemId)}">
                <input class="form-control" type="hidden" name="cartItems[${item.itemId}][qty]" value="${item.quantity}">
            `;
            
            document.getElementById('cartItems').innerHTML += itemHtml;
        });
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

        document.getElementById('totalOrder').value = subTotalPrice;
        document.getElementById('totalAmount').value = totalPrice;
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
