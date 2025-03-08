@extends('layouts.home')

@section('title', 'Pengeluaran Saya')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Pengeluaran Saya</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Pengeluaran Saya</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
<div class="container mt-5">
    <h1 class="text-center">Laporan Pengeluaran Saya</h1>
    <form action="{{ route('expenditures.download') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-block mb-4">Download Laporan PDF</button>
    </form>
    @if($expenditures->isEmpty())
        <div class="alert alert-warning text-center">Tidak ada pengeluaran terkait dengan donasi Anda.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Aktivitas</th>
                        <th>Email Pendonasi</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Bukti Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenditures as $index => $expenditure)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $expenditure->product->name ?? '-' }}</td>
                            <td>{{ $expenditure->activity_name ?? '-' }}</td>
                            <td>
                                @foreach($relatedTransactions->where('products_id', $expenditure->products_id) as $related)
                                <span>{{ $related->email }}</span><br>
                                @endforeach
                            </td>
                            <td>{{ $expenditure->created_at->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format($expenditure->amount, 2, ',', '.') }}</td>
                            <td>{{ $expenditure->description ?? '-' }}</td>
                            <td>
                                @if($expenditure->photo_proof)
                                    <img src="{{ asset('storage/' . $expenditure->photo_proof) }}" alt="Bukti" class="img-thumbnail" width="100">
                                @else
                                    Tidak ada bukti foto
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('expenditures.show', $expenditure->id) }}" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
