@extends('layouts.home')

@section('title')
    Statistics | Donation
@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Donation Statistics</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Statistics</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container">
    <div class="container mb-4">
        <form method="GET" action="{{ route('statistics') }}" class="d-flex justify-content-between align-items-center">
            <label for="bulanSelect" class="me-2">Pilih Bulan:</label>
            <select name="month" id="bulanSelect" class="form-select form-select-sm w-auto">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $i == $selectedMonth ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                    </option>
                @endfor
            </select>
            <button type="submit" class="btn btn-primary btn-sm ms-2">Filter</button>
        </form>
    </div>

    <!-- Total Donation and Expenditure -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card text-center">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Total Donasi</span>
                </div>
                <div class="card-body">
                    <i class="fas fa-donate fa-3x mb-3 text-primary"></i>
                    <h4>Total Donasi</h4>
                    <h2 id="total-donasi">Rp{{ number_format($totalDonasi, 2, ',', '.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-center">
                <div class="card-header">
                    Total Pengeluaran
                </div>
                <div class="card-body">
                    <i class="fas fa-wallet fa-3x mb-3 text-danger"></i>
                    <h4>Total Pengeluaran</h4>
                    <h2 id="total-pengeluaran">Rp{{ number_format($totalPengeluaran, 2, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>

        <!-- Charts Section -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Grafik Jumlah Donasi</div>
                    <div class="card-body">
                        <canvas id="donasiChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Grafik Jumlah Pengeluaran</div>
                    <div class="card-body">
                        <canvas id="pengeluaranChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <br>

    <!-- Top Donors Section -->
    <div class="card mb-4">
        <div class="card-header">Daftar User Terbanyak Donasi</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topDonors as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->username ?? 'Tidak Ada' }}</td>
                                <td>{{ $item->email ?? 'Tidak Ada' }}</td>
                                <td>Rp{{ number_format($item->total_donasi, 2, ',', '.') ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const donasiLabels = @json($donasiLabels);
    const donasiDataset = @json($donasiDataset);
    const pengeluaranLabels = @json($pengeluaranLabels);
    const pengeluaranDataset = @json($pengeluaranDataset);

    const donasiChart = new Chart(document.getElementById('donasiChart'), {
        type: 'line',
        data: {
            labels: donasiLabels,
            datasets: [{
                label: 'Total Donasi',
                data: donasiDataset,
                borderColor: '#4CAF50',
                backgroundColor: 'rgba(76, 175, 80, 0.2)',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Tanggal' } },
                y: { title: { display: true, text: 'Total Donasi (Rp)' } }
            }
        }
    });

    const pengeluaranChart = new Chart(document.getElementById('pengeluaranChart'), {
        type: 'line',
        data: {
            labels: pengeluaranLabels,
            datasets: [{
                label: 'Total Pengeluaran',
                data: pengeluaranDataset,
                borderColor: '#F44336',
                backgroundColor: 'rgba(244, 67, 54, 0.2)',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Tanggal' } },
                y: { title: { display: true, text: 'Total Pengeluaran (Rp)' } }
            }
        }
    });
</script>
@endsection
