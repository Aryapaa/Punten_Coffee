@extends('layouts.layoutwonavbar')

@section('content')

<main>
    <section class="d-lg-none topbar">
        <div>
            <ul class="d-flex align-items-center py-3" style="overflow-x: auto">
                <li class="rounded px-2 py-1">
                    <a href="#foods">FOODS</a>
                </li>
                <li class="rounded px-2 py-1"><a href="#taichan">TAICHAN</a></li>
                <li class="rounded px-2 py-1"><a href="#snack">SNACKS</a></li>
                <li class="rounded px-2 py-1"><a href="#extra">EXTRA</a></li>
            </ul>
        </div>
    </section>

    <div class="container d-flex">
        <section class="sidebar col-lg-4 d-none d-lg-block">
            <div class="mt-5">
                <ul>
                    <li><a href="#FODOS">FOODS</a></li>
                    <li><a href="#TAICHAN">TAICHAN</a></li>
                    <li><a href="#SNACKS">SNACKS</a></li>
                    <li><a href="#EXTRA">EXTRA</a></li>
                </ul>
            </div>
        </section>

        <section class="col-12 col-lg-8">
            @if($subcategories->count())
            @foreach($subcategories as $subcategory)
            <h3 id="{{$subcategory->name}}">{{$subcategory->name}}</h3>
            <div class="row d-flex justify-content-between d-grid gap-3">
                <!-- @foreach($items as $item) -->
                <div class="col-12 col-md-6 col-lg-5">
                    <img class="rounded img-fluid mb-2" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="/asset/front-end/img/{{$item->photo}}" alt="{{$item->photo}}">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="w-75">{{$items->name}}</h5>
                        <h4><b>{{$items->price}}</b></h4>
                    </div>
                </div>
                <!-- @endforeach -->
            </div>
            @endforeach
            @endif
        </section>
    </div>
</main>

@endsection