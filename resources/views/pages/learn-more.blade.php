@extends('layouts.home')

@section('title')
    Learn More | Donation
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Learn More</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Learn More</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-6 mb-5">Yayasan Al Falah Cahaya Mandiri (YACMA)</h1>
    </div>
    <div class="h-100">
        <div class="mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px; text-align: justify; margin-bottom: 10px;">
            <p class="mb-5">
                Yayasan Al Falah Cahaya Mandiri (YACMA) adalah yayasan yang bergerak dalam bidang pendidikan dan sosial, di mana pendidikan direncanakan dibangun berjenjang mulai dari pendidikan tingkat dasar hingga pendidikan tinggi. Dalam kegiatan sosial, YACMA memfokuskan diri pada pembangunan Rumah Yatim Mandiri (RYM), pembangunan lembaga Pendidikan, dan pembangunan Rumah Sakit Islam (RSI).
            </p>
            <p class="mb-5">
                Saat ini lokasi sekretariat YACMA difokuskan di Jl. H. Agus Salim Rt.22 / Rw.05 Blok Kaum Kelurahan Cigadung Kecamatan Subang Kabupaten Subang. Kegiatan operasional YACMA adalah pengajian anggota secara bulanan, konsultasi pendidikan, bimbingan belajar, penyuluhan untuk masyarakat sekitar yayasan, dan program pengelolaan rumah yatim. YACMA didirikan berdasarkan Akta Notaris Urip Suripah,, S.H., No. 01, pada tanggal 19 Juni 2020. YACMA mempunyai maksud dan tujuan dibidang Sosial, Keagamaan, dan Kemanusiaan.
            </p>
        </div>
    </div>
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-6 mb-5">Rumah Yatim Mandiri (RYM) YACMA</h1>
    </div>
    <div class="h-100">
        <div class="mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px; text-align: justify; margin-bottom: 10px;">
            <p class="mb-5">
                Rumah Yatim Mandiri adalah salah satu program dari Yayasan Al Falah Cahaya Mandiri yang bergerak dalam bidang pendidikan dan sosial. Berdiri sejak 2018 hingga sampai saat ini Rumah Yatim Mandiri masih memfokuskan diri pada hal hal yang berkaitan dengan pembinaan anak-anak yatim, piatu dan dhuafa, baik itu dari segi keperluan sehari-harinya, pendidikan, kesehatan, hingga aspek jasmani dan rohani.
            </p>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6 mb-5">Visi & Misi RYM</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Visi</h4>
                        <p class="mb-4">Menciptakan Anak-anak yang terampil baik itu dari sisi keagamaan, pendidikan, keterampilan, akhlak dan budi pekertinya.
                    </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <h4 class="mb-3">Misi</h4>
                        <p class="mb-4"> Selalu mengedepankan aspek pendekatan secara psikologis, agamis.</p>

            </div>
        </div>
    </div>


    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection
