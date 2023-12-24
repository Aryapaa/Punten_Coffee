<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="/asset/images/profile/user-1.jpg" alt=""
                            style="width: 35px; height: 35px; object-fit: cover;" class="rounded-circle img-fluid">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <span class="badge bg-black my-2 p-2 mx-3 text-center block w-75 text-gray-600">{{Auth::user()->name}}</span>
                            <a href="/user/{{Auth::user()->id}}/profile" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="/user/{{Auth::user()->id}}/setting" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-settings fs-6"></i>
                                <p class="mb-0 fs-3">Ubah Password</p>
                            </a>
                            <a class="btn btn-outline-primary mx-3 mt-2 d-block" href="/logout" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
