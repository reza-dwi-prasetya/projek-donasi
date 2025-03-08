<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
</head>
<body>
    <h1>Laporan Keuangan</h1>
    <p>Periode: {{ $data['start_date'] }} - {{ $data['end_date'] }}</p>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Jumlah (Rp)</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataLaporan as $row)
                <tr>
                    <td>{{ $row['tanggal'] }}</td>
                    <td>{{ $row['jenis'] }}</td>
                    <td>{{ $row['jumlah'] }}</td>
                    <td>{{ $row['keterangan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
