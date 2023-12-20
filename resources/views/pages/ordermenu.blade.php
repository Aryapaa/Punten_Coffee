@extends('layouts.navbarorder')

@section('content')

<section class="d-lg-none topbar" id="items-container">
    <div>
        <ul class="d-flex align-items-center  py-3" style="overflow-x: auto">
            <li class="rounded px-2 py-1">
                <a href="javascript:void(0);" onclick="loadAllItems()">ALL ITEMS</a>
            </li>

            @foreach($subcategory as $sc)
            <li class="rounded px-2 py-1">
                <a href="javascript:void(0);" class="subcategory-link" data-id="{{ $sc->id }}"
                    onclick="loadItemsBySubcategory({{ $sc->id }})">
                    {{ $sc->name }}
                </a>
            </li>


            @endforeach

        </ul>
    </div>
</section>
<h4 class="p-2">
    @if ($subcatid == NULL)
    ALL ITEMS
    @else
    {{ $subcatid->name }}
    @endif
</h4>
<section>
    @if($items->count())
    <div class="menublack mx-2 my-2">
        <!-- <h3 id="menublack"><b>Black</b></h3> -->

        @foreach($items as $item)

        <div class="card flex-row align-items-center m-2 px-2 shadow-sm">
            <img src="/asset/front-end/img/{{$item->photo}}" class="rounded img-fluid w-25" alt="{{$item->photo}}"
                style="aspect-ratio: 1 / 1; object-fit: cover; height: 100%">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <h4><b>{{$item->price}}</b></h4>
                <!-- <button type="button" class="btn "><i class="fa fa-minus"></i></button>
                <input type="text" class="w-25" value="1">
                <button type="button" class="btn"><i class="fa fa-plus"></i></button> -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{$item->id}}">
                    <i class="fa fa-plus"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Punten Coffee</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="/asset/front-end/img/{{$item->photo}}" class="rounded img-fluid w-75"
                                    alt="{{$item->photo}}" style="aspect-ratio: 1 / 1; object-fit: cover; height: 100%">
                                <h5 class="card-title mt-3">{{$item->name}}</h5>
                                <h4><b>{{$item->price}}</b></h4>
                            </div>
                            <div class="modal-footer">
                                <form id="quantityForm{{ $item->id }}">
                                    <button type="button" class="btn" onclick="decreaseQuantity('{{ $item->id }}')">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input type="text" class="w-25" id="quantityInput{{ $item->id }}"
                                        value="{{ $item->qty }}">
                                    <button type="button" class="btn" onclick="increaseQuantity('{{ $item->id }}')">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn text-white" style="background-color: #8B0C0C"
                                        onclick="saveChanges('{{ $item->id }}')">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
</section>
@endsection

<script>
    function decreaseQuantity(itemId) {
        var quantityInput = document.getElementById('quantityInput' + itemId);
        var currentQuantity = parseInt(quantityInput.value);

        if (!isNaN(currentQuantity) && currentQuantity > 0) {
            quantityInput.value = currentQuantity - 1;
        }
    }

    function increaseQuantity(itemId) {
        var quantityInput = document.getElementById('quantityInput' + itemId);
        var currentQuantity = parseInt(quantityInput.value);

        if (!isNaN(currentQuantity)) {
            quantityInput.value = currentQuantity + 1;
        }
    }

    function saveChanges(itemId) {
        var quantityInput = document.getElementById('quantityInput' + itemId);
        var newQuantity = quantityInput.value;

        var existingData = JSON.parse(localStorage.getItem('cartData')) || [];

        var index = existingData.findIndex(function (item) {
            return item.itemId === itemId;
        });

        if (index !== -1) {
            existingData[index].quantity = newQuantity;
        } else {
            existingData.push({ itemId: itemId, quantity: newQuantity });
        }

        localStorage.setItem('cartData', JSON.stringify(existingData));

        console.log('Saving changes for item ' + itemId + '. New Quantity: ' + newQuantity);
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- menampilkan data berdasarkan kategori --}}
<script>
    $(document).ready(function () {

        $('.subcategory-link').on('click', function () {
            
            var id_sub_cat = $(this).data('id');

            var url = "{{ route('pages.ordermenubysub', ['id_sub_cat' => ':id_sub_cat']) }}";
            url = url.replace(':id_sub_cat', id_sub_cat);

            window.history.pushState({}, '', url);

        });
    });

</script>

{{-- menampilkan data berdasarkan kategori tanpa reload --}}
<script>
    function loadItemsBySubcategory(subcategoryId) {

        $('.navbar').addClass('d-none');

        $.ajax({
            url: '/order/' + subcategoryId,
            type: 'GET',
            success: function (data) {
                $('#items-container').html(data);
            },
            error: function (xhr, status, error) {
                console.error(error);

                $('.navbar').removeClass('d-none');
            }
        });
    }

</script>

{{-- menampilkan semua items --}}
<script>
    function loadAllItems() {

        $('.navbar').addClass('d-none');

        $.ajax({
            url: '/order',
            type: 'GET',
            success: function (data) {

                $('#items-container').html(data);
            },
            error: function (xhr, status, error) {
                console.error(error);

                $('#navbar').removeClass('d-none');
            }
        });
    }

</script>