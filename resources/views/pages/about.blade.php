@extends('layouts.home')

@section('title')
    About | Donation
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="assets/img/about-1.jpg" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="assets/img/about-2.jpg" alt=""
                            style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">About Us</div>
                        <h1 class="display-6 mb-5">Rumah Yatim Mandiri (RYM) YACMA</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2">Kami Berusaha Membangun Masa Depan Cerah untuk Anak-anak Yang Membutuhkan</p>
                            <span class="text-primary">Founder</span>
                        </div>
                        <p class="mb-5">Yayasan Al Falah Cahaya Mandiri adalah organisasi nirlaba yang berkomitmen untuk meningkatkan kesejahteraan anak yatim. Kami menyediakan tempat tinggal, pendidikan, dan dukungan finansial bagi anak-anak yatim, serta membangun komunitas yang peduli dan religius.</p>
                        <a class="btn btn-outline-primary py-2 px-3" href="{{ url('/contact') }}">
                            Contact Us
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Apa yang Kami Lakukan?</div>
                <h1 class="display-6 mb-5">Pelajari Lebih Lanjut Apa yang Kami Lakukan dan Terlibat</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="assets/img/icon-1.png" alt="">
                        <h4 class="mb-3">Penampungan anak yatim untuk usia sekolah</h4>
                        <p class="mb-4">Yayasan menyediakan tempat tinggal dan asuhan bagi anak yatim yang berusia sekolah dasar. Saat ini, yayasan menampung 1 anak yatim.</p>
                        <a class="btn btn-outline-primary px-3" href="{{ url('/learn1') }}">
                            Learn More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="assets/img/icon-1.png" alt="">
                        <h4 class="mb-3">Santunan kepada anak yatim</h4>
                        <p class="mb-4"> Yayasan memberikan bantuan finansial berupa santunan kepada 41 anak yatim.</p>
                        <a class="btn btn-outline-primary px-3" href="{{ url('/learn2') }}">
                            Learn More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="assets/img/icon-1.png" alt="">
                        <h4 class="mb-3">Penampungan infak dan shodaqoh untuk anak yatim</h4>
                        <p class="mb-4">Yayasan menerima donasi berupa infak dan shodaqoh dari masyarakat untuk membantu anak yatim.</p>
                        <a class="btn btn-outline-primary px-3" href="{{ url('/learn3') }}">
                            Learn More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

@endsection
