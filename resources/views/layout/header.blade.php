<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-danger h1" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-sm bg-white navbar-light shadow fixed-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-danger"><i class="fa fa-map-marker-alt text-danger me-2"></i>JustDial</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('adminWelcome')}}" class="nav-item nav-link {{ (request()->is('admin/index')) ? 'active' : '' }}">Home</a>
                <a href="{{route('addServices')}}" class="nav-item nav-link {{ (request()->is('admin/addServices')) ? 'active' : '' }}">Services</a>
                <a href="{{route('addProvider')}}" class="nav-item nav-link {{ (request()->is('admin/addProvider')) ? 'active' : '' }}">Service Providers</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown">Account</a>
                    <div class="dropdown-menu fade-up">
                        <ul class="list-unstyled">
                            @guest    
                                <li class="">
                                    <a href="{{route('login')}}" class="dropdown-item text-dark">Login</a>
                                </li>
                                <li class="">
                                    <a href="{{route('register')}}" class="dropdown-item text-dark">Sign-Up</a>
                                </li>
                            @else
                                <li class="">
                                    <a href="{{route('logout')}}" class="dropdown-item text-dark">Logout</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
            <a href="" class="btn btn-danger py-4 px-lg-5 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
