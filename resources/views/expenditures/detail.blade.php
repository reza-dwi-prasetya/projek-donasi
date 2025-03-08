<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengeluaran Donasi | Donation</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('background-image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .donation-detail-container {
            max-width: 800px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }

        .donation-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .donation-content > div {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .donation-content label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .donation-content img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer; /* Indicate it's clickable */
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(to right, #ff6a3d, #ff9c3d);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #ff9c3d, #ff6a3d);
        }

        @media (max-width: 768px) {
            .donation-content {
                grid-template-columns: 1fr;
            }
            .modal-content {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="donation-detail-container">
        <h1>Detail Pengeluaran</h1>
        <div class="donation-content">
            <div>
                <label><strong>Tanggal:</strong></label>
                <p>{{ \Carbon\Carbon::parse($expenditure->created_at)->format('d F Y') }}</p>
            </div>
            <div>
                <label><strong>Jumlah:</strong></label>
                <p>Rp {{ number_format($expenditure->amount, 2, ',', '.') }}</p>
            </div>
            <div>
                <label><strong>Deskripsi:</strong></label>
                <p>{{ $expenditure->description }}</p>
            </div>
            <div>
                <label><strong>Bukti Foto:</strong></label>
                @if($expenditure->photo_proof)
                    <img id="myImg" src="{{ asset('storage/' . $expenditure->photo_proof) }}" alt="Bukti: {{ $expenditure->activity_name }}">
                @else
                    <p class="text-muted">Tidak ada bukti foto</p>
                @endif
            </div>
        </div>

        <form action="{{ route('expenditures') }}" method="GET">
            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Kembali</button>
        </form>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="img01" style="max-width:100%;">
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
</body>
</html>
