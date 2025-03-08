<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Print</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 50px;
            vertical-align: middle;
        }
        .header h1 {
            display: inline;
            font-size: 24px;
            margin-left: 10px;
        }
        .header h2 {
            font-size: 20px;
            margin: 5px 0;
        }
        .header p {
            margin: 5px 0;
        }
        .invoice-title {
            text-align: right;
            margin-bottom: 20px;
        }
        .invoice-title h2 {
            font-size: 24px;
            margin: 0;
        }
        .invoice-title p {
            font-size: 18px;
            margin: 0;
        }
        .details, .items, .summary, .additional-info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details td, .items th, .items td, .summary td, .additional-info td {
            border: 1px solid #000;
            padding: 8px;
        }
        .details td {
            border: none;
        }
        .items th {
            background-color: #f2f2f2;
        }
        .items td {
            text-align: center;
        }
        .summary td {
            text-align: right;
        }
        .additional-info td {
            border: none;
        }
        .signature {
            width: 100%;
            margin-top: 50px;
            text-align: center;
        }
        .signature div {
            display: inline-block;
            width: 30%;
            text-align: center;
        }
        .signature div p {
            margin: 50px 0 0;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
                <h1>Yayasan Al-Falah Cahaya Mandiri (YACMA)</h1>
                <p>Rumah Yatim Mandiri</p>
                <p>Jl. MT. Haryono No. 14, Kaum, Cigadung, Subang</p>
                <p>Contact Person: +62 8112221082, +62 87838382486 | No Rek. BSI: 7300733373</p>
        </div>

        <div class="invoice-title">
            <h2>INVOICE #{{ $data->kode_donasi }}</h2>
            <p>{{ $data->created_at->format('d-m-Y H:i:s') }}</p>
        </div>

        <table class="details">
            <tr>
                <td width="50%">
                    <p><strong>Tagihan:</strong></p>
                    <p>{{ Auth::user()->email }}</p>
                </td>
                <td width="50%">
                    <p><strong>Dikirim Ke:</strong></p>
                    <p>{{ Auth::user()->address }}</p>
                </td>
            </tr>
        </table>

        <div class="mb-4">
            <p><strong>Metode Pembayaran:</strong> {{ strtoupper($data->metode_pembayaran) }}</p>
        </div>

        <table class="items">
            <thead>
                <tr>
                    <th>Donasi Untuk</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->product->name }}</td>
                    <td>Rp {{ number_format($data->donate_price, 2, ',', '.') }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>Rp {{ number_format($data->donate_price, 2, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        </table>

        <div class="summary">
            <table>
                <tr>
                    <td width="80%">Keterangan:</td>
                    <td width="20%"></td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>Rp {{ number_format($data->donate_price, 2, ',', '.') }}</td>
                </tr>
            </table>
        </div>

        <div class="text-center mt-4 no-print">
            <p>Terima kasih telah mendonasikan dana. Semoga kebaikan Anda dibalas oleh Tuhan Yang Maha Esa.</p>
            <button class="btn btn-warning" onclick="window.print()">Print Invoice</button>
        </div>
    </div>
</body>
</html>
