@extends('layouts.layout')

@section('content')

<section class="header">
  <!-- <img src="Beverages.png" alt="Gambar Baverages" width="100%" /> -->
  <img class="w-100 c-img" src="{{url('asset/front-end/img/Beverages.png')}}" alt="Gambar Baverages" />
</section>

<main>
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

  <div class="container d-flex">
    <section class="sidebar col-lg-4 d-none d-lg-block">
      <div class="mt-5">
        <ul>
          <li><a href="#black">BLACK</a></li>
          <li><a href="#white">WHITE</a></li>
          <li><a href="#coffee">COFFEE</a></li>
          <li><a href="#noncoffee">NON COFFEE</a></li>
          <li><a href="#tea">TEA</a></li>
          <li><a href="#mocktail">MOCKTAIL</a></li>
          <li>
            <a href="#manualbrew">MANUAL BREW</a>
          </li>
          <li>
            <a href="#baristachoice">BARISTA CHOICE</a>
          </li>
        </ul>
      </div>
    </section>

    <section class="col-12 col-lg-8">
      <div class="p-5 container-lg" id="black">
        <h3 class="mb-4"><b>BLACK</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/americano.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Americano</h5>
              <h4><b>20</b></h4>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Americano Lychee Ice</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center ">
              <h5>Americano Berry /Peach Ice</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="white">
        <h3 class="mb-4"><b>WHITE</b></h3>
        <div class="row flex-row-reverse d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/capuccino.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Cappucino</h5>
              <h4><b>20</b></h4>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Flat White</h5>
              <h4><b>27</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Caffe Latte</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="coffee">
        <h3 class="mb-4"><b>COFFEE</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5 mb-3 mb-md-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/caramel.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Caramel Macchiato</h5>
              <h4><b>30</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 mb-3 mb-md-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/butterscotch.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Butterscotch Coffee</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>

        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5 mb-3 mb-md-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/strawcoff.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Strawberry Coffee</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 mb-3 mb-md-5 d-flex flex-column justify-content-center d-grid gap-3">
            <div class="d-flex justify-content-between align-items-center">
              <h5>Mochaccino</h5>
              <h4><b>27</b></h4>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <h5>Banana Coffee</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <h5>Bombon Coffee</h5>
              <h4><b>20</b></h4>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <h5>Punten Coffee</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <h5>Pandan Coffee</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>

        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5 mb-3 mb-md-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/rum.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Rum Coffee</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 mb-3 mb-md-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/aren.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Aren Coffee</h5>
              <h4><b>23</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="noncoffee">
        <h3 class="mb-4"><b>NON COFFEE</b></h3>
        <div class="row flex-row-reverse d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/strawprin.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Strawberry Princess</h5>
              <h4><b>23</b></h4>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Black Charcoal</h5>
              <h4><b>26</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Banana Choco</h5>
              <h4><b>26</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Choco Rum</h5>
              <h4><b>26</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Chocolate</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-between mt-5"> <!-- //buat segaris// -->
          <div class="col-12 col-md-6 col-lg-5 mb-3 mb-md-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/leci.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Lychee Yakult</h5>
              <h4><b>22</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 mb-3 mb-md-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/matcha.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Matcha</h5>
              <h4><b>27</b></h4>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/red.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Red Velvet</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mt-2">
              <h5>Cotton Candy</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Strawberry Smoothies</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Mango Yakult</h5>
              <h4><b>23</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Fresh</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="tea">
        <h3 class="mb-4"><b>TEA</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/punten.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Punten Tea</h5>
              <h4><b>27</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Sweet Framboise</h5>
              <h4><b>23</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Peach Tea</h5>
              <h4><b>22</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Thai Tea</h5>
              <h4><b>22</b></h4>
            </div>
          </div>
        </div>

        <div class="row flex-row-reverse d-flex justify-content-between mt-4">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/strawtea.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Strawberry Tea</h5>
              <h4><b>20</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mt-2">
              <h5>Mango Tea</h5>
              <h4><b>22</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Lychee Tea</h5>
              <h4><b>20</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Lemon Tea</h5>
              <h4><b>20</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="mocktail">
        <h3 class="mb-4"><b>MOCKTAIL</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mt-2">
              <h5>Purnama</h5>
              <h4><b>30</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Holly Berry</h5>
              <h4><b>30</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Sexy Peach</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Shooting Mango</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mt-2">
              <h5>Summer Punch</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Peach Butterfly</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Pink Party</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Blue Lagoon</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="manualbrew">
        <h3 class="mb-4"><b>MANUAL BREW (V60)</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mt-2">
              <h5>Beans International</h5>
              <h4><b>30</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Holly Beans Local</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="baristachoice">
        <h3 class="mb-4"><b>BARISTA CHOICE</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mt-2">
              <h5>Special Beverage</h5>
              <h4><b>33</b></h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

@include('layouts.footer')

@endsection