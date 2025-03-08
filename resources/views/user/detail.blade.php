{{-- @extends('layouts.home') --}}

@section('title')
    Detail Riwayat Donasi | Donation
@endsection

{{-- @section('content') --}}
<style>
    /* Container for the donation detail page */
    .donation-detail-container {
        max-width: 800px; /* Set a maximum width for the container */
        margin: 0 auto; /* Center the container */
        padding: 20px; /* Add padding */
        background-color: #f8f9fa; /* Light background color */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    /* Card header style */
    .card-header {
        background-color: #ff6600; /* Custom primary color */
        color: white; /* White text */
        padding: 15px; /* Padding for the header */
        border-top-left-radius: 8px; /* Rounded corners */
        border-top-right-radius: 8px; /* Rounded corners */
    }

    /* Card body style */
    .card-body {
        padding: 20px; /* Padding for the body */
    }

    /* Heading styles */
    .card-body h5 {
        font-size: 1.25rem; /* Slightly larger font size */
        margin-bottom: 15px; /* Space below headings */
    }

    /* Badge styles */
    .badge {
        font-size: 0.9rem; /* Smaller font size for badges */
    }

    /* Button styles */
    .btn-warning {
        background-color: #ffc107; /* Bootstrap warning color */
        border: none; /* Remove border */
        transition: background-color 0.3s; /* Smooth transition */
    }

    .btn-warning:hover {
        background-color: #e0a800; /* Darker shade on hover */
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .donation-detail-container {
            padding: 15px; /* Reduce padding on smaller screens */
        }

        .card-body {
            padding: 15px; /* Reduce padding on smaller screens */
        }
    }
</style>

<div class="donation-detail-container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Detail Donasi {{ $invoice->kode_donasi }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">Tagihan:</h5>
                    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Alamat:</strong> {{ Auth::user()->address }}</p>
                    <p class="mt-3"><strong>Metode Pembayaran:</strong> {{ strtoupper($invoice->metode_pembayaran) }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Detail Donasi:</h5>
                    <p><strong>Tanggal Donasi:</strong> {{ $invoice->created_at->format('d-m-Y H:i:s') }}</p>
                    <p><strong>Nama Program:</strong> {{ $invoice->product->name }}</p>
                    <p><strong>Kategori:</strong> {{ $invoice->product->category->name }}</p>
                    <p><strong>Status:</strong>
                        @if ($invoice->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif ($invoice->status == 'settlement')
                            <span class="badge bg-success">Success</span>
                        @else
                            <span class="badge bg-danger">Failed</span>
                        @endif
                    </p>
                    <p class="mt-3"><strong>Jumlah Donasi:</strong> Rp {{ number_format($invoice->donate_price, 2, ',', '.') }}</p>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="lead">Terima kasih telah mendonasikan dana. Semoga kebaikan Anda dibalas oleh Tuhan Yang Maha Esa.</p>
                <a href="{{ route('riwayat.print', $invoice->id) }}" target="_blank" class="btn btn-warning mt-2">
                    <i class="fas fa-print"></i>
                    Print Invoice
                </a>
                </div>
            </div>
        </div>
    </div>
    {{-- @endsection --}}
