@extends('layouts.layoutwonavbar')

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
        <h3 id="menublack"><b>Black</b></h3>

        @foreach($items as $item)

        <div class="card flex-row">
            <img src="/asset/front-end/img/{{$item->photo}}" class="rounded img-fluid w-25" alt="{{$item->photo}}" style="aspect-ratio: 1 / 1; object-fit: cover; height: 100%">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <h4><b>{{$item->price}}</b></h4>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                    </svg>
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
                                <h5 class="card-title">{{$item->name}}</h5>
                                <h4><b>{{$item->price}}</b></h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
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