<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include "head.html";
    ?>
</head>

<body>
    <!-- Navbar Start & Topbar Start -->
    <?php
        include "toolbar.html";
        include "Nav.html";
    ?>
    <!-- Navbar End & Topbar Start-->


    <!-- Page Header Start -->
    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-1 pb-2 mb-5">
        <div class="container py-3">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Tentang</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="index.php">Beranda</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white disabled" href="">Tentang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid" src="img/about.jpg" alt="">
                </div>
                <div class="col-lg-7 mt-5 mt-lg-0 pl-lg-5">
                    <h1 class="mb-4">Tentang T&F Laundry</h1>
                    <h5 class="font-weight-medium font-italic mb-4">Ayo, buatlah kebersihan menjadi gaya hidup Anda yang lebih baik!</h5>
                    <p class="mb-2">T&F Laundry merupakan unit usaha yang dikelola oleh kinerja handal dan berpengalaman dalam memberikan pelayanan yang bergerak di bidang laundry, termasuk juga konsep cuci dan setrika per kilogram dan Free Pickup
                    </p>
                    <div class="row">
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Laundry Kiloan</p>
                            </div>
                        </div>
                        <div class="col-sm-6 pt-3">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-check text-primary mr-2"></i>
                                <p class="text-secondary font-weight-medium m-0">Laundry Satuan</p>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Working Process Start -->
    <div class="container-fluid pt-5">
        <div class="container">
                        <h3 class="display-4 text-center mb-5">Cara Memesan T&F Laundry</h3>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">1</h2>
                        </div>
                        <h6 class="font-weight-bold m-0 mt-2">Pesan via  Aplikasi T&F Laundry</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">2</h2>
                        </div>
                        <h6 class="font-weight-bold m-0 mt-2">Pilih layanan yang dibutuhkan dan detail pesanan (layanan, jumlah, dll)</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">3</h2>
                        </div>
                        <h6 class="font-weight-bold m-0 mt-2">Konfirmasi pesanan Anda (alamat, jam dan tanggal)</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">4</h2>
                        </div>
                        <h6 class="font-weight-bold m-0 mt-2">Mitra terbaik kami akan segera datang!</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Working Process End -->


    

    <!-- Footer Start -->
    <?php 
        include "footer.html";
    ?>
    <!-- Footer End -->

</body>

</html>