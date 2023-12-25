@extends('layouts.layout')

@section('content')
<!-- Carousel -->
<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="{{url('asset/front-end/img/tmpt1.jpg')}}" class="d-block w-100 c-img" alt="slide1">
        </div>
        <div class="carousel-item c-item">
            <img src="{{url('asset/front-end/img/tmpt2.jpg')}}" class="d-block w-100 c-img" alt="slide2">
        </div>
        <div class="carousel-item c-item">
            <img src="{{url('asset/front-end/img/tmpt3.jpg')}}" class="d-block w-100 c-img" alt="slide3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- End Carousel -->

<!-- About Us -->
<section id="aboutus" class="mt-5">
    <div class="container">
        <div class="row text-center">
            <h1 class="display-6 mb-3">About <span style="color: brown;">Us</span></h1>
            <p class="lh-lg fs-6">Everyday 12.00 - 00.00 Jalan Juanda 2. Samarinda, Kalimantan Timur · Minuman baru nih temen-temen! kalo lagi main ataupun mau mampir ke Punten coffee.</p>
        </div>
    </div>
</section>
<!-- End About Us -->

<!-- Foods & Snacks -->
<section id="foods" class="section-relative mt-5">
    <div class="bg-image">
        <img src="{{url('asset/front-end/img/homefood.png')}}" alt="" class="w-100 c-img" style="filter: brightness(50%); ">
    </div>
    <div class="container">
        <div class="content px-md-5">
            <div class="row">
                <div class="col-12 col-md-6 order-1 order-md-0 d-flex flex-column">
                    <div class="content-body">
                        <img src="{{url('asset/front-end/img/coffee2.jpg')}}" alt="" class="w-75 rounded">
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-0 order-md-1 d-flex align-self-center flex-column text-light">
                    <h1 class="display-4">Foods & Snacks</h1>
                    <div class="content-body">
                        <p>Dari camilan gurih yang pas untuk menemani secangkir kopi hangat hingga hidangan ringan yang istimewa untuk memuaskan selera Anda, kami menawarkan pengalaman kuliner yang lengkap di setiap gigitan.</p>
                        <a class="btn" style="padding: 10px; border:3px solid white; background-color: white;" href="{{ route('menu',['category'=>1]) }}" role="button">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Foods & Snacks -->

<!-- Beverages -->
<section id="beverages" class="section-relative">
    <div class="bg-image">
        <img src="{{url('asset/front-end/img/homedrink.png')}}" alt="" class="w-100 c-img" style="filter: brightness(50%); ">
    </div>
    <div class="container">
        <div class="content px-md-5">
            <div class="row">
                <div class="col-12 col-lg-6 order-1 order-md-1 order-lg-0 d-flex align-self-center flex-column text-light ">
                    <h1 class="display-4">Beverages</h1>
                    <div class="content-body">
                        <p>Nikmati setiap tegukan dengan ragam minuman pilihan kami, mulai dari kopi berkualitas tinggi hingga minuman spesial yang diracik dengan cermat untuk memenuhi selera Anda.</p>
                        <a class="btn" style="padding: 10px; border:3px solid white; background-color: white;" href="{{ route('menu',['category'=>2]) }}" role="button">Explore More</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 offset-md-6 col-lg-6 offset-lg-0 order-0 order-md-0 order-lg-1 d-flex flex-column">
                    <div class="content-body">
                        <img src="{{url('asset/front-end/img/coffee2.jpg')}}" alt="" class="w-75 rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Beverages -->

<!-- Reservation -->
<section id="reserv" class="">
    <div class="container">
        <div class="content px-md-5">
            <div class="row">
                <div class="col-12 col-lg-6 content-body">
                    <img src="{{url('asset/front-end/img/homeresv.png')}}" alt="" class="w-100 rounded">
                </div>
                <div class="col-12 col-lg-6 align-self-center reserv-body">
                    <h1>Reservation</h1>
                    <p>Segera reservasi meja Anda dan mari berbagi kenikmatan kopi dan suasana istimewa di Punten Coffee. Terima kasih atas kepercayaan Anda, dan kami tunggu kehadiran Anda dengan penuh antusiasme!</p>
                    <a class="btn" style="padding: 10px; background-color: black; color: white;" href="{{ route('pages.reservation') }}" role="button">Reservation Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Reservation -->

@include('layouts.footer')

@endsection