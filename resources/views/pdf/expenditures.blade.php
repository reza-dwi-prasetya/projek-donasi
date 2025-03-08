<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengeluaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .header {
            padding: 20px; /* Tambahkan padding untuk jarak */
            background-color: #f8f9fa; /* Warna latar belakang (opsional) */
        }
        .logo-container {
            display: flex;
            justify-content: space-between; /* Ratakan logo ke kiri dan kanan */
            align-items: center; /* Ratakan vertikal */
            margin-bottom: 15px; /* Jarak antara logo dan judul */
        }
        .header h1 {
            text-align: center;
            margin-bottom: 10px;
        }
        .header p {
            text-align: center;
            margin-bottom: 5px;
        }
        .header img {
            max-width: 100px;
            height: auto;
            margin: 0 10px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row align-items-center header">
            <div class="col-md-4">
                <img src="assets/img/yayasan.jpg" alt="Logo Yayasan">
            </div>
            <div class="col-md-4 text-center">
                <h1>Yayasan Al-Falah Cahaya Mandiri (YACMA)</h1>
                <p>Rumah Yatim Mandiri</p>
                <p>Jl. MT. Haryono No. 14, Kaum, Cigadung, Subang</p>
                <p>Contact Person: +62 8112221082, +62 87838382486 | No Rek. BSI: 7300733373</p>
            </div>
            <div class="col-md-4">
                <img src="assets/img/RYM.jpg" alt="Logo RYM">
            </div>
        </div>

        <h2>Laporan Pengeluaran</h2>
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

        <div class="footer">
            <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
