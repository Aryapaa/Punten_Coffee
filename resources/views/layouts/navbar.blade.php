<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><i><span style="color: brown;">Punten</span> Coffee.</i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto ">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Foods & Snacks</a></li>
                        <li><a class="dropdown-item" href="{{ route('pages.menu_beverages') }}">Beverages</a></li>
                    </ul>
                </div>
                <a class="nav-link" href="{{ route('pages.reservation') }}">Reservation</a>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->