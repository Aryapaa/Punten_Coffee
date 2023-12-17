@extends('layouts.layout')

@section('content')

  <section class="header">
    <!-- <img src="Beverages.png" alt="Gambar Baverages" width="100%" /> -->
    <img class="w-100" style="height: 25rem; object-fit: cover" src="{{url('asset/front-end/img/foods.png')}}" alt="Gambar foods" />
  </section>

<main>
  <section class="d-lg-none topbar">
    <div>
      <ul class="d-flex align-items-center py-3" style="overflow-x: auto">
        <li class="rounded px-2 py-1"> <a href="#foods">FOODS</a></li>
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
          <li><a href="#foods">FOODS</a></li>
          <li><a href="#taichan">TAICHAN</a></li>
          <li><a href="#snack">SNACKS</a></li>
          <li><a href="#extra">EXTRA</a></li>
        </ul>
      </div>
    </section>

    <section class="col-12 col-lg-8">
      <div class="p-5 container-lg" id="foods">
        <h3 class="mb-4"><b>FOODS</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/katsu matah.png')}}" alt="Gambar Foods">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="w-75">Chiken Katsu Sambal Matah</h5>
              <h4><b>27</b></h4>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
                <h5>Ayam Suwir Sambal Matah</h5>
                <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center ">
                <h5>Nasi Telur Sambal Matah</h5>
                <h4><b>25</b></h4>
            </div>
          </div>
        </div>
        
        <div class="row flex-row-reverse d-flex justify-content-between mt-4">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/mie.png')}}" alt="Gambar Baverages" />
            <div class="d-flex justify-content-between align-items-center">
              <h5>Indomie Goreng Telur</h5>
              <h4><b>15</b></h4>
            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Chicken Katsu Curry</h5>
              <h4><b>30</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Nasi Gila Punten</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Ayam Geprek Punten</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="foods">
        <h3 class="mb-4"><b>TAICHAN</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/t-mix.png')}}" alt="Gambar Foods">
            <div class="d-flex justify-content-between align-items-center">  
              <h5 class="w-75">Taichan Mix</h5>
              <h4><b>33</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/t-kulit.png')}}" alt="Gambar Foods">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="w-75">Taichan Kulit</h5>
              <h4><b>33</b></h4>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-between mt-5">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/t-dada.png')}}" alt="Gambar Foods">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="w-75">Taichan Dada</h5>
              <h4><b>33</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="foods">
        <h3 class="mb-4"><b>SNACKS</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/tahucabe.png')}}" alt="Gambar Foods">
            <div class="d-flex justify-content-between align-items-center">  
              <h5 class="w-75">Tahu Cabe Garam</h5>
              <h4><b>20</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Mix Platter</h5>
              <h4><b>30</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Dimsum Goreng</h5>
              <h4><b>25</b></h4>
            </div>
          </div>
        </div>

        <div class="row flex-row-reverse d-flex justify-content-between mt-4">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/kentang.png')}}" alt="Gambar Foods">
            <div class="d-flex justify-content-between align-items-center">  
              <h5 class="w-75">French Fries</h5>
              <h4><b>20</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Tempe Mendoan</h5>
              <h4><b>15</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Singkong Goreng</h5>
              <h4><b>15</b></h4>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-between mt-4">
          <div class="col-12 col-md-6 col-lg-5">
            <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%" src="{{url('asset/front-end/img/cireng.png')}}" alt="Gambar Foods">
            <div class="d-flex justify-content-between align-items-center">  
              <h5 class="w-75">Cireng</h5>
              <h4><b>15</b></h4>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Piscok Original</h5>
              <h4><b>25</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Tahu Bakso</h5>
              <h4><b>20</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center">
              <h5>Donat Kentang</h5>
              <h4><b>15</b></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 container-lg" id="foods">
        <h3 class="mb-4"><b>SNACKS</b></h3>
        <div class="row d-flex justify-content-between">
          <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-center mt-2 mt-md-0 d-grid gap-3">
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Outside</h5>
              <h4><b>6</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Mineral Water</h5>
              <h4><b>5</b></h4>
            </div>
            <div class="d-flex justify-content-between justify-items-center mb-md-2">
              <h5>Nasi</h5>
              <h4><b>5</b></h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

@include('layouts.footer')

@endsection
  

      