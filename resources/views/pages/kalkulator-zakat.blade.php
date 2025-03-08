@extends('layouts.home')

@section('title')
    kalkulator zakat | Donation
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn"
    data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">kalkulator zakat</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white"
                        href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white"
                        href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active"
                    aria-current="page">kalkulator zakat</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5 ">
    <div class="container">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-12 wow fadeIn"
                    data-wow-delay="0.1s">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kalkulator ini dibuat berdasarkan peraturan Menteri Agama RI No. 52
                                Tahun
                                2019</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat
                                maal
                                yang wajib dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari
                                pekerjaan yang tidak melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas
                                per
                                tahun. Kadar zakat penghasilan senilai 2,5%. Dalam praktiknya, zakat penghasilan dapat
                                ditunaikan setiap bulan dengan nilai nishab per bulannya adalah setara dengan nilai
                                seperduabelas dari 85 gram emas, dengan kadar 2,5%. Jadi apabila penghasilan setiap
                                bulan
                                telah melebihi nilai nishab bulanan, maka wajib dikeluarkan zakatnya sebesar 2,5% dari
                                penghasilannya tersebut. (Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri
                                Agama Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf
                                Qardawi).
                            </p>
                            <form action="{{ route('kalkulator-zakat.store') }}"
                                method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="jenis_zakat">Pilih Jenis Zakat:</label>
                                    <select class="form-control"
                                        id="jenis_zakat"
                                        name="jenis_zakat"
                                        required>
                                        <option value="">-- Pilih Jenis Zakat --</option>
                                        <option value="maal">Zakat Maal</option>
                                        <option value="penghasilan">Zakat Penghasilan</option>
                                    </select>
                                    @error('jenis_zakat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jumlah">Jumlah (Rp):</label>
                                    <input type="number"
                                        class="form-control"
                                        id="jumlah"
                                        name="jumlah"
                                        required>
                                    @error('jumlah')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="btn btn-primary">Hitung Zakat</button>
                            </form>

                            @if(session('zakat'))
                                <div class="mt-4">
                                    <h3>Hasil Perhitungan Zakat</h3>
                                    <p>Jenis Zakat: {{ ucfirst(session('zakat')['jenisZakat']) }}</p>
                                    <p>Jumlah: Rp {{ number_format(session('zakat')['jumlah'], 2, ',', '.') }}</p>
                                    <p>Zakat yang harus dikeluarkan: Rp
                                        {{ number_format(session('zakat')['jumlahZakat'], 2, ',', '.') }}
                                    </p>
                                    <a href="{{ route('donate') }}" class="btn btn-success">Donasi Sekarang</a>                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
