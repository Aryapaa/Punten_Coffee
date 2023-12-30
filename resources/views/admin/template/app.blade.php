<!doctype html>
<html lang="en">

{{-- head --}}
@include('admin.template.header')

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('admin.template.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('admin.template.topbar')
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- Footer Start -->
            @include('admin.template.footer')
            <!--  Footer End -->
        </div>
    </div>
    @include('admin.template.javascript')
</body>

</html>
