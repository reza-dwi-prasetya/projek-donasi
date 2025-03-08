<style>
    /* Center alignment using Flexbox */
    .container-fluid {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Full viewport height */
        padding: 0;
        background-color: #f8f9fa; /* Optional background */
    }

    /* Card Styles */
    .cause-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        border-radius: 15px;
        padding: 20px; /* Reduced padding */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Reduced shadow */
        margin: 0 auto;
        max-width: 800px;
        width: 100%; /* Optional: ensures consistent scaling */
    }

    .cause-card img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px; /* Reduced margin */
    }

    .cause-card h1 {
        font-size: 2rem; /* Reduced font size */
        font-weight: 700;
        color: #333;
        text-align: center;
        margin-bottom: 10px; /* Reduced margin */
    }

    .cause-card h2 {
        font-size: 1.5rem; /* Reduced font size */
        font-weight: 600;
        color: #555;
        margin-bottom: 10px; /* Reduced margin */
    }

    .cause-card p {
        font-size: 1rem; /* Reduced font size */
        line-height: 1.4; /* Reduced line height */
        color: #555;
        text-align: center;
        margin-bottom: 15px; /* Reduced margin */
    }

    .cause-card h5 {
        text-align: center;
        font-weight: 600;
        margin-bottom: 8px; /* Reduced margin */
    }

    .cause-card .progress-container {
        width: 80%;
        margin: 0 auto;
        position: relative;
        margin-bottom: 15px; /* Reduced margin */
    }

    .cause-card .progress {
        height: 12px; /* Reduced height */
        border-radius: 6px; /* Reduced border radius */
        overflow: hidden;
        background: linear-gradient(to right, #ddd, #ddd); /* Light gray background */
    }

    .cause-card .progress-bar {
        background-image: linear-gradient(to right, #ff6600, #ff6600); /* Orange progress */
        height: 100%;
        transition: width 0.3s ease;
        color: white;
        text-align: center;
        line-height: 12px; /* Vertically center text */
        font-size: 0.9rem; /* Reduced font size */
    }

    /* Button Styles */
    .btn-primary {
        background-color: #ff6600;
        border: none;
        padding: 8px 15px; /* Reduced padding */
        border-radius: 5px;
        color: #fff;
        font-size: 0.9rem; /* Reduced font size */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #ff6600;
    }


    /*Overall Layout*/
    .container-fluid {
        padding: 0;
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
    }
    .col-lg-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 15px;
    }
    @media (max-width: 768px) {
        .col-lg-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

</style>
<!-- Cause Details Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cause-card">
                    <img class="img-fluid rounded" src="{{ Storage::url($products->photos) }}" alt="{{ $products->name }}">
                    <h1 class="mb-4">{{ $products->name }}</h1>
                    <h2>Description</h2>
                    <p>{!! $products->description !!}</p>
                    <div class="mb-4 progress-container">
                        <h5>Donation Progress</h5>
                        <p class="text-dark">{{ number_format($products->current_price) }} / {{ number_format($products->goal_price) }} terkumpul</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                 style="width: {{ ($products->current_price / $products->goal_price) * 100 }}%;"
                                 aria-valuenow="{{ ($products->current_price / $products->goal_price) * 100 }}"
                                 aria-valuemin="0" aria-valuemax="100">
                                <span>{{ round(($products->current_price / $products->goal_price) * 100) }}%</span>
                            </div>
                            <div class="progress-line"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary" id="donateButton" data-bs-toggle="modal" data-bs-target="#donateModal">Donate Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cause Details End -->
