<?php $__env->startSection('title'); ?>
    Home | Donation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="assets/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-4 text-white mb-3 animated slideInDown">Rumah Yatim Mandiri (RYM) Yayasan Al Falah Cahaya Mandiri (YACMA)</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Berikan harapan baru bagi mereka yang membutuhkan, donasikan sekarang dan jadilah bagian dari perubahan.</p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="<?php echo e(url('/learn-more')); ?>">
                                        Learn More
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-4 text-white mb-3 animated slideInDown">Rumah Yatim Mandiri (RYM) YACMA</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Bergabunglah dengan kami dalam membangun masa depan yang lebih baik, donasikan dan wujudkan mimpi bersama.</p>
                                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="<?php echo e(url('/learn-more')); ?>">
                                        Learn More
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="assets/img/about-1.jpg" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="assets/img/about-2.jpg"
                            alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">About Us</div>
                        <h1 class="display-6 mb-5">Rumah Yatim Mandiri (RYM) YACMA</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2">Kami Berusaha Membangun Masa Depan Cerah untuk Anak-anak Yang Membutuhkan</p>
                            <span class="text-primary">Founder</span>
                        </div>
                        <p class="mb-5">Yayasan Al Falah Cahaya Mandiri adalah organisasi nirlaba yang berkomitmen untuk meningkatkan kesejahteraan anak yatim. Kami menyediakan tempat tinggal, pendidikan, dan dukungan finansial bagi anak-anak yatim, serta membangun komunitas yang peduli dan religius.</p>
                        <a class="btn btn-outline-primary py-2 px-3" href="<?php echo e(url('/contact')); ?>">
                            Contact Us
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Apa yang Kami Lakukan?</div>
            <h1 class="display-6 mb-5">Pelajari Lebih Lanjut Apa yang Kami Lakukan dan Terlibat</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="assets/img/icon-1.png" alt="">
                    <h4 class="mb-3">Penampungan anak yatim untuk usia sekolah</h4>
                    <p class="mb-4">Yayasan menyediakan tempat tinggal dan asuhan bagi anak yatim yang berusia sekolah dasar. Saat ini, yayasan menampung 1 anak yatim.</p>
                    <a class="btn btn-outline-primary px-3" href="<?php echo e(url('/learn1')); ?>">
                        Learn More
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="assets/img/icon-1.png" alt="">
                    <h4 class="mb-3">Santunan kepada anak yatim</h4>
                    <p class="mb-4"> Yayasan memberikan bantuan finansial berupa santunan kepada 41 anak yatim.</p>
                    <a class="btn btn-outline-primary px-3" href="<?php echo e(url('/learn2')); ?>">
                        Learn More
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="assets/img/icon-1.png" alt="">
                    <h4 class="mb-3">Penampungan infak dan shodaqoh untuk anak yatim</h4>
                    <p class="mb-4">Yayasan menerima donasi berupa infak dan shodaqoh dari masyarakat untuk membantu anak yatim.</p>
                    <a class="btn btn-outline-primary px-3" href="<?php echo e(url('/learn3')); ?>">
                        Learn More
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!--kalkulator-->

<!-- kalkulator End -->

 <!-- Causes Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Feature Causes</div>
                <h1 class="display-6 mb-5">Setiap Anak Berhak Mendapatkan Kesempatan Hidup Lebih Baik.</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div
                            class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                            <div class="text-center p-4 pt-0">
                                <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                    <small><?php echo e($item->category->name); ?></small>
                                </div>
                                <h5 class="mb-3"><?php echo e($item->name); ?></h5>
                                <p><?php echo $item->thumbnail_description; ?></p>
                                <div class="causes-progress bg-light p-3 pt-2">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-dark"><?php echo e(number_format($item->goal_price)); ?> <small
                                                class="text-body">Goal</small></p>
                                        <p class="text-dark"><?php echo e(number_format($item->current_price)); ?> <small
                                                class="text-body">Terkumpul</small></p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: <?php echo e(($item->current_price / $item->goal_price) * 100); ?>%;"
                                            aria-valuenow="<?php echo e(($item->current_price / $item->goal_price) * 100); ?>"
                                            aria-valuemin="0" aria-valuemax="100">
                                            <span><?php echo e(round(($item->current_price / $item->goal_price) * 100)); ?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="img-fluid" src="<?php echo e(Storage::url($item->photos)); ?>" alt="">
                                <div class="causes-overlay">
                                    <a class="btn btn-outline-primary" href="<?php echo e(url('/donation')); ?>">
                                        Donate Now
                                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- Causes End -->
<!-- Donate Start -->
<div class="container-fluid donate my-5 py-5" data-parallax="scroll" data-image-src="assets/img/carousel-2.jpg">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Donate Now</div>
                <h1 class="display-6 mb-5">Terima kasih atas kebaikan hati Anda dalam membantu sesama.</h1>
                <p class="mb-0">Anda dapat melihat Riwayat Donasi dan Penggunaan dana dari dana yang telah Anda donasikan dengan masuk (login) ke akun.</p>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 bg-white p-5">
                    <form method="post" action="<?php echo e(route('donate.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="username"
                                        placeholder="Your Name" name="username">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-light border-0" id="email"
                                        placeholder="Your Email" name="email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select id="products_id" name="products_id"
                                        class="form-control bg-light border-0" style="padding-top: 0 !important; padding-bottom: 0 !important">
                                        <option value="">Choose Campaign</option>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input class="form-control bg-light border-0" name="message" id="message" placeholder="Your Message" style="height: 100px;"></input>
                                    <label for="message">Your Message</label>
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
                                    
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary px-5" style="height: 60px;">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Projek _Donasi(V2)\resources\views/pages/home.blade.php ENDPATH**/ ?>