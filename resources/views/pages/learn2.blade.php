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
        <h1 class="display-6 mb-5">Santunan kepada anak yatim</h1>
    </div>
    <div class="h-100">
        <div class="mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px; text-align: justify; margin-bottom: 10px;">
            <p class="mb-5">
                Selain memberikan santunan finansial, yayasan juga berperan aktif dalam memastikan kebutuhan pendidikan, kesehatan, dan kesejahteraan anak-anak yatim terpenuhi. Program ini mencakup penyediaan biaya sekolah, perlengkapan belajar, serta akses ke layanan kesehatan dasar. Yayasan juga mengadakan acara rutin seperti kegiatan keagamaan, pelatihan keterampilan, dan pertemuan motivasi untuk meningkatkan kepercayaan diri serta semangat anak-anak yatim dalam meraih cita-cita mereka. Dengan dukungan para donatur dan relawan, yayasan berkomitmen untuk memberikan dampak positif yang berkelanjutan bagi anak-anak yatim yang dibantu.
           </p>
        </div>
    </div>
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-6 mb-5">Penampungan infak dan shodaqoh untuk anak yatim</h1>
    </div>
    <div class="h-100">
        <div class="mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px; text-align: justify; margin-bottom: 10px;">
            <p class="mb-5">
                Melalui program ini, yayasan berkomitmen untuk mendistribusikan donasi secara transparan dan tepat sasaran. Bantuan yang diberikan meliputi kebutuhan dasar, pendidikan, dan pengembangan keterampilan anak-anak yatim agar mereka dapat tumbuh menjadi generasi yang mandiri dan berdaya. Yayasan juga menjalin kemitraan dengan berbagai pihak untuk memastikan keberlanjutan program dan memberikan dampak positif yang lebih luas kepada masyarakat.
            </p>
        </div>
    </div>
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-6 mb-5">Penampungan anak yatim untuk usia sekolah</h1>
    </div>
    <div class="h-100">
        <div class="mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px; text-align: justify; margin-bottom: 10px;">
            <p class="mb-5">
                Selain menyediakan tempat tinggal, yayasan juga memberikan pendidikan tambahan berupa bimbingan belajar untuk mendukung prestasi anak-anak di sekolah. Program ini mencakup pelajaran akademik, pendidikan agama, dan pengembangan keterampilan sosial agar anak-anak dapat tumbuh menjadi individu yang mandiri dan berkarakter. Yayasan bekerja sama dengan para relawan dan donatur untuk memenuhi kebutuhan sehari-hari, seperti makanan bergizi, seragam sekolah, dan perlengkapan belajar. Dengan lingkungan yang penuh kasih sayang dan perhatian, yayasan berkomitmen untuk memberikan masa depan yang lebih baik bagi anak-anak yatim yang membutuhkan.
            </p>
        </div>
    </div>


    <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection
