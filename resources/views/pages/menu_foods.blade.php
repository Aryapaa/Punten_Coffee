<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <title>Daftar Menu Punten Coffee</title>
  <link rel="stylesheet" href="daftar_menu_foods.css" />
  <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
</head>

<body>
  <section class="header">
    <!-- <img src="Beverages.png" alt="Gambar Baverages" width="100%" /> -->
    <img class="w-100" style="height: 25rem; object-fit: cover" src="asset/Beverages.png" alt="Gambar Baverages" />
  </section>

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
              <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%"
                src="asset/katsu matah.png" alt="Gambar Baverages">
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
          
          <div class="row flex-row-reverse d-flex justify-content-between">
            <div class="col-12 col-md-6 col-lg-5">
              <img class="rounded img-fluid mb-3" style="aspect-ratio: 1 / 1; object-fit: cover; width: 100%"
                src="asset/mie.png" alt="Gambar Baverages" />
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
                <h5>Nasi Gila Punten</h5>
                <h4><b>25</b></h4>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
   

        