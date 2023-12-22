@extends('layouts.layout')

@section('content')

<main>
    <section class="d-lg-none topbar">
        <div>
            <ul class="d-flex align-items-center py-3" style="overflow-x: auto">
            @foreach($category->subCategories as $subcategory)
                <li class="rounded px-2 py-1"><a href="#{{$subcategory->name}}">{{$subcategory->name}}</a></li>
            @endforeach
            </ul>
        </div>
    </section>

    <div class="container d-flex">
        <section class="sidebar col-lg-4 d-none d-lg-block">
            <div class="mt-5">
                <ul>
                @foreach($category->subCategories as $subcategory)
                    <li><a href="#{{$subcategory->name}}">{{$subcategory->name}}</a></li>
                @endforeach 
                </ul>
            </div>
        </section>

        <section class="col-12 col-lg-8">
        @if
            @foreach($category->subCategories as $subcategory)
            <h3 id="{{$subcategory->name}}" class="mt-5 mb-3">{{$subcategory->name}}</h3>
            <div class="row d-flex justify-content-between d-grid gap-4">
            @foreach($subcategory->items as $item)
                <div class="col-12 col-md-6 col-lg-5">
                    <img class="rounded img-fluid mb-2" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="/asset/front-end/img/{{$item->photo}}" alt="{{$item->photo}}">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="w-50">{{$item->name}}</h5>
                        <h4><b>{{$item->price}}</b></h4>
                    </div>
                </div>
            @endforeach
            </div>
            @endforeach
        @endif
        </section>
    </div>
</main>

@include('layouts.footer')

@endsection