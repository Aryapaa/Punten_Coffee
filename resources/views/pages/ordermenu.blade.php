@extends('layouts.navbarorder')

@section('content')

<section class="d-lg-none topbar">
    <div>
        <ul class="d-flex align-items-center  py-3" style="overflow-x: auto">
            <li class="rounded px-2 py-1">
                <a href="#black">BLACK</a>
            </li>
            <li class="rounded px-2 py-1"><a href="#white">WHITE</a></li>
            <li class="rounded px-2 py-1"><a href="#coffee">COFFEE</a></li>
            <li class="rounded px-2 py-1">
                <a href="#noncoffee">NON COFFEE</a>
            </li>
            <li class="rounded px-2 py-1"><a href="#tea">TEA</a></li>
            <li class="rounded px-2 py-1">
                <a href="#mocktail">MOCKTAIL</a>
            </li>
            <li class="rounded px-2 py-1">
                <a href="#manualbrew">MANUAL BREW</a>
            </li>
            <li class="rounded px-2 py-1">
                <a href="#baristachoice">BARISTA CHOICE</a>
            </li>
        </ul>
    </div>
</section>
<section>
    @if($items->count())
    <div class="menublack mx-2 my-2">
        <!-- <h3 id="menublack"><b>Black</b></h3> -->

        @foreach($items as $item)

        <div class="card flex-row">
            <img src="/asset/front-end/img/{{$item->photo}}" class="rounded img-fluid w-25" alt="{{$item->photo}}" style="aspect-ratio: 1 / 1; object-fit: cover; height: 100%">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <h4><b>{{$item->price}}</b></h4>
                <!-- <button type="button" class="btn "><i class="fa fa-minus"></i></button>
                <input type="text" class="w-25" value="1">
                <button type="button" class="btn"><i class="fa fa-plus"></i></button> -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Punten Coffee</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="/asset/front-end/img/{{$item->photo}}" class="rounded img-fluid w-75" alt="{{$item->photo}}" style="aspect-ratio: 1 / 1; object-fit: cover; height: 100%">
                                <h5 class="card-title mt-3">{{$item->name}}</h5>
                                <h4><b>{{$item->price}}</b></h4>
                            </div>
                            <div class="modal-footer">
                                    <form id="quantityForm{{ $item->id }}">
                                        <button type="button" class="btn" onclick="decreaseQuantity('{{ $item->id }}')">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" class="w-25" id="quantityInput{{ $item->id }}" value="{{ $item->qty }}">
                                        <button type="button" class="btn" onclick="increaseQuantity('{{ $item->id }}')">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="saveChanges('{{ $item->id }}')">Save changes</button>
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

        // Add your logic to save the changes (e.g., AJAX request or form submission)
        console.log('Saving changes for item ' + itemId + '. New Quantity: ' + newQuantity);
    }
</script>
