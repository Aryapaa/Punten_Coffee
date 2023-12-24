<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
         <h3>Punten Coffee</h3>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    </ul>
    @if (Route::has('login'))
    <div class="col-md-3 text-end">
        @auth
        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
        @endauth
    </div>
    @endif
</header>
