@extends('layouts.home')

@section('title')
    Donate | Donation
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Donasi</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Donate</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Donate Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Donate Now</div>
                    <h1 class="display-6 mb-5">Terima kasih atas kebaikan hati Anda dalam membantu sesama.</h1>
                    <p class="mb-0">Anda dapat melihat Riwayat Donasi dan Penggunaan dana dari dana yang telah Anda donasikan dengan masuk (login) ke akun.</p>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-secondary p-5">
                        <form id="donation-form" method="POST" action="{{ route('midtrans.checkout') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-light border-0" name="username" id="username" placeholder="Your Name" required>
                                        <label for="username">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-light border-0" name="email" id="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select id="products_id" name="products_id" class="form-control bg-light border-0" required>
                                            <option value="">Choose Campaign</option>
                                            @foreach ($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="products_id"></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-light border-0" name="description" id="description" placeholder="Your Description" style="height: 100px;" required></textarea>
                                        <label for="description">Your Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-light border-0" name="donate_price" id="donate_price" placeholder="Enter donation amount" min="1" required>
                                        <label for="donate_price">Donation Amount</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control bg-light border-0" required>
                                            <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                            <option value="bank_transfer">Bank Transfer</option>
                                            <option value="credit_card">Kartu Kredit</option>
                                            <option value="e_wallet">Dompet Elektronik</option>
                                        </select>
                                        {{-- <label for="metode_pembayaran">Metode Pembayaran</label> --}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5 w-100" style="height: 60px;">
                                        Donate Now
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Donate End -->

<!-- Midtrans Script -->
<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    @if (session('snapToken'))
    window.snap.pay("{{ session('snapToken') }}", {
        onSuccess: function (result) {
            alert("Payment success!");
            console.log(result);
            window.location.href = "{{ route('success') }}"; // Redirect to success page
        },
        onPending: function (result) {
            alert("Payment pending!");
            console.log(result);
        },
        onError: function (result) {
            alert("Payment failed!");
            console.log(result);
        },
        onClose: function () {
            alert("Payment popup was closed");
        }
    });
    @endif
</script>
@endsection
