<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include "head.html";
    ?>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="note/Privacy_Policy.php">Privacy Policy</a>
                        <span class="text-white">|</span>
                    <a class="text-white pl-3" href="note/disclaimer.php">Disclaimer</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="https://www.facebook.com/tflaundry/" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://youtu.be/DQnA6JxnPyM" target="_blank" style="margin-left: 1px; background:transparent; padding:0px;">
                        <img width="75%" height="75%" src="img/googleplay-link.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php 
        include "Nav.html";
    ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="page-header container-fluid bg-secondary pt-2 pt-lg-1 pb-2 mb-5">
        <div class="container py-3">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-4 mb-md-0 text-white">Paket Harga</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn text-white" href="">Home</a>
                        <i class="fas fa-angle-right text-white"></i>
                        <a class="btn text-white disabled" href="">Harga</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid pt-5 pb-3"> 
        
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3"></h6>
            <h1 class="display-4 text-center mb-5">DAFTAR HARGA</h1>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-secondary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h3 class="text-white">Kiloan</h3>
                            <h1 class="display-4 text-white mb-0">
                            <small class="align-top" style="font-size: 25px; line-height: 45px;">Rp 10.000/Kg</small>
                            </h3>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>Baju</p>
                            <p>Celana</p>
                            <p>Jaket</p>
                            <p>-</p>
                        </div>
                        <a href="" class="btn btn-secondary py-2 px-4">Signup Now</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-primary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h3 class="text-white">Satuan</h3>
                            <h1 class="display-4 text-white mb-0">
                            <small class="align-top" style="font-size: 25px; line-height: 45px;">Rp 20.000/Kg</small>
                            </h3>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>Karpet</p>
                            <p>Badcover</p>
                            <p>Hordeng</p>
                            <p>Boneka</p>
                        </div>
                        <a href="" class="btn btn-primary py-2 px-4">Signup Now</a>
                    </div>
                </div>
                

    <!-- Footer Start -->
    <?php 
        include "footer.html";
    ?>
    <!-- Footer End -->



</body>

</html>