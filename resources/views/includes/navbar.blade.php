<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Jl. MT Haryono No 14, Cogadung, Subang</small>
            <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>+628112221082</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-white-50 ms-3" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="text-white-50 ms-3" href="https://www.youtube.com/@rumahyatimmandiri1296"><i class="fab fa-youtube"></i></a>
            <a class="text-white-50 ms-3" href="https://www.instagram.com/rumahyatimmandiri?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">Yacma</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('causes') }}" class="nav-item nav-link">Causes</a>
                <a class="nav-link" href="{{ route('kalkulator-zakat.create') }}">Zakat Calculator</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('service') }}" class="dropdown-item">Service</a>
                        <a href="{{ route('donate') }}" class="dropdown-item">Donate</a>
                        <a href="{{ route('team') }}" class="dropdown-item">Our Team</a>
                    </div>
                </div>
                @auth
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">History</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('statistics') }}" class="dropdown-item">Statistics</a>
                        <a href="{{ route('riwayat.index') }}" class="dropdown-item">Donation Reports</a>
                        <a href="{{ route('expenditures') }}" class="dropdown-item">Expenditure Reports</a>
                    </div>
                </div>
                @endauth
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn btn-outline-primary py-2 px-3" href="{{ route('donate') }}">
                    Donate Now
                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                @auth
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-danger py-2 px-3">Logout</button>
                    </form>
                @else
                    <a class="btn btn-outline-primary py-2 px-3" href="{{ route('login') }}">
                        Login
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                @endauth
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
