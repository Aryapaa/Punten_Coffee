<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('auth.room.header')

<body class="antialiased">

    <div class="container">

        {{-- Navbar --}}
        @include('auth.room.navbar')
        {{-- End Navbar --}}

        {{--  --}}
        <div class="container-fluid">
            @yield('content')
        </div>
        {{--  --}}

        {{-- footer --}}
        @include('auth.room.footer')
        {{-- end footer --}}

        {{-- js --}}
        @include('auth.room.javascript')
        
</body>

</html>
