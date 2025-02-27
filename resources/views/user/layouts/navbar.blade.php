    <!-- Topbar Start -->
    <div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
        <div class="container">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <div class="border-end border-primary pe-3">
                            <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                        </div>
                        <div class="ps-3">
                            <a href="mailto:example@gmail.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>example@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-flex justify-content-end">
                        <div class="d-flex border-end border-primary pe-3">
                            <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="dropdown ms-3">
                            <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small><i class="fas fa-globe-europe text-primary me-2"></i> English</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="#" class="dropdown-item">English</a>
                                <a href="#" class="dropdown-item">Bangla</a>
                                <a href="#" class="dropdown-item">French</a>
                                <a href="#" class="dropdown-item">Spanish</a>
                                <a href="#" class="dropdown-item">Arabic</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="#" class="navbar-brand p-0">
                        <h1 class="text-primary mb-0"><i class="fab fa-slack me-2"></i></h1>
                        {{-- <img src="img/logo.png" alt="Logo"> --}}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto">
                            <a class="nav-item nav-link {{ request()->routeIs('user.home') ? 'active' : '' }}" href="{{ route('user.home') }}">Home</a>
                            <a class="nav-item nav-link {{ request()->routeIs('blogs.all') ? 'active' : '' }}" href="{{ route('blogs.all') }}">Blogs</a>
                            <a class="nav-item nav-link {{ request()->routeIs('products.show') ? 'active' : '' }}" href="{{ route('products.show') }}">Products</a>
                            <a class="nav-item nav-link {{ request()->routeIs('orders.history') ? 'active' : '' }}" href="{{ route('orders.history') }}">Orders History</a>
                            <a class="nav-item nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">Profile</a>
                            @guest
                                <a class="nav-item nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                                <a class="nav-item nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                            @else
                                <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </div>

                    </div>
                </nav>
            </div>
        </div>

        <!-- Navbar & Hero End -->
