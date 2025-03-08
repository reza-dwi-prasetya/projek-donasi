@extends('layouts.home')

@section('title')
    Riwayat Donasi | Donation
@endsection

@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Riwayat Donasi</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Riwayat Donasi</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<div class="container mt-5">
    <h1 class="mb-4 text-center">Riwayat Donasi</h1>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Program</th>
                                <th scope="col">Jumlah Donasi</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $invoice->created_at->format('d-m-Y H:i:s') }}</td> <!-- Tampilkan tanggal transaksi -->
                                    <td>{{ $invoice->product->name }}</td>
                                    <td>Rp {{ number_format($invoice->donate_price, 2, ',', '.') }}</td>
                                    <td>{{ $invoice->metode_pembayaran_label ?? 'Tidak Diketahui' }}</td>
                                    <td>
                                        @if ($invoice->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif ($invoice->status == 'settlement')
                                            <span class="badge bg-success">Success</span>
                                        @else
                                            <span class="badge bg-danger">Failed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('riwayat.detail', $invoice->id) }}" class="btn btn-primary btn-sm me-2">Detail</a>
                                        <a href="{{ route('riwayat.print', $invoice->id) }}" target="_blank" class="btn btn-warning btn-sm">Print</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data riwayat donasi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
