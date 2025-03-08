@extends('layouts.home')

@section('title')
    About | Donation
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Riwayat Donasi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Donasi</a></div>
            <div class="breadcrumb-item">Riwayat</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah Donasi</th>
                                        <th>Tanggal Donasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->product->name ?? '-' }}</td>
                                            <td>Rp{{ number_format($transaction->donate_price, 0, ',', '.') }}</td>
                                            <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ route('user.donations.detail', $transaction->id) }}" class="btn btn-primary btn-sm">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada riwayat donasi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
