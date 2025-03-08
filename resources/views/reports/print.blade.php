<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
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
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
        }
        .header p {
            font-size: 14px;
            margin: 5px 0;
        }
        .header img {
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
    <div class="header">
        <div>
            <img src="{{ asset('images/logo-kiri.png') }}" alt="Logo Kiri" width="100">
            <img src="{{ asset('images/logo-kanan.png') }}" alt="Logo Kanan" width="100">
        </div>
        <h1>Yayasan Al-Falah Cahaya Mandiri (YACMA)</h1>
        <p>Rumah Yatim Mandiri</p>
        <p>Jl. MT. Haryono No. 14, Kaum, Cigadung, Subang</p>
        <p>Contact Person: +62 8112221082, +62 87838382486 | No Rek. BSI: 7300733373</p>
    </div>
    <h1 style="text-align: center;">Laporan Keuangan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Aktivitas</th>
                <th>Nama Kegiatan</th>
                <th>Jumlah (Rp)</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $key => $report)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $report->date }}</td>
                <td>{{ $report->amount > 0 ? 'Pemasukan' : 'Pengeluaran' }}</td>
                <td>{{ $report->activity_name }}</td>
                <td>{{ number_format($report->amount, 2, ',', '.') }}</td>
                <td>{{ $report->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
