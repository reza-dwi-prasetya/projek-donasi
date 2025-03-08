@extends('layouts.home')

@section('title', 'Midtrans Checkout')

@section('content')
    <!-- Kontainer Utama -->
    <div class="container py-5">
        <div class="text-center">
            <h1>Complete Your Donation</h1>
            <p>{{ $product->name ?? 'Donation' }} - Rp.{{ number_format($donate_price, 0, ',', '.') }}</p>
            <button id="pay-button" class="btn btn-primary">Pay Now</button>
        </div>
    </div>

    <!-- Midtrans Snap Script -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Payment Success!");
                    console.log(result);
                },
                onPending: function(result) {
                    alert("Waiting for your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Payment Failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert("You closed the payment page!");
                }
            });
        };
    </script>
@endsection
