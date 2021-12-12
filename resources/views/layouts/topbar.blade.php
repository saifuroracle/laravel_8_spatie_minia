@section('topbar_content')
    <header id="page-topbar">
        <div class="navbar-header bg-theme">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box bg-theme-light">
                    <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24"> --}}

                        </span>
                        <span class="logo-lg">
                            {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24"> --}}
                             <span class="logo-txt text-white">Company</span>
                        </span>
                    </a>

                    <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                        <span class="logo-sm">
                            {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24"> --}}

                        </span>
                        <span class="logo-lg">
                            {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24"> --}}
                             <span class="logo-txt">Company</span>
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars   text-white"></i>
                </button>


            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="search" class="icon-lg"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item bg-soft-light" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/user.jpg') }}"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium text-white">{{ Auth::user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block text-white"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        {{-- <a class="dropdown-item" href="apps-contacts-profile.html"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen</a>

                        <div class="dropdown-divider"></div> --}}

                        <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="mdi mdi-logout font-size-16 align-middle me-1"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>
@endsection
