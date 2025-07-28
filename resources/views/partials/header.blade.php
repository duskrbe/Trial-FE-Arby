 <!-- Start Header -->
    <header>
        <nav class="navbar navbar-expand-lg header-transparent bg-transparent header-reverse" data-header-hover="light">
            <div class="container-fluid">
                <div class="col-auto col-xxl-3 col-lg-2 me-lg-0 me-auto">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo-white.png') }}" alt="Logo" class="default-logo">
                        <img src="{{ asset('images/logo-black.png') }}" alt="Logo Black" class="alt-logo">
                        <img src="{{ asset('images/logo-black.png') }}" alt="Mobile Logo" class="mobile-logo">
                    </a>
                </div>
                <div class="col-auto col-xxl-6 col-lg-8 menu-order position-static">
                    <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Beranda</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mengapa</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Program</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Fasilitas</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Spotlight</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Daftar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto col-xxl-3 col-lg-2 text-end d-none d-sm-flex">
                    <div class="header-icon">
                        <div class="header-button">
                            <a href="#" class="btn btn-large btn-transparent-white-light btn-rounded text-transform-none border-1">
                                Start a project <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->
        <!-- end header -->