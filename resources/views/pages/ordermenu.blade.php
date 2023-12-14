@extends('layouts.layout')

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
                    <h5 class="card-title">Americano Lychee Ice</h5>
                    <h5><b>25k</b></h5>
                    <a class="button" href="#" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg></a>
                </div>
            </div>
        @endforeach
        @endif
</section>

@include('layouts.footer')
@endsection