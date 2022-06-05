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


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Laundry & Dry Cleaning</h4>
                            <h1 class="display-3 text-white mb-md-4">LAUNDRY MAHAL ASAL BERSIH</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Laundry & Dry Cleaning</h4>
                            <h1 class="display-3 text-white mb-md-4">KILOAN, SATUAN</h1>
                        
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-secondary" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Contact Info Start -->
    <div class="container-fluid contact-info mt-5 mb-4">
        <div class="container" style="padding: 0 30px;">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex">
                        <i class="fa fa-2x fa-map-marker-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Lokasi</h5>
                            <p class="m-0"><a href="https://bit.ly/397akDZ" class="text-white mb-2" target="_blank">Jl. Prima Blok L6 No1, Kalideres, DKI Jakarta</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-primary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-envelope text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Email</h5>
                            <p class="m-0 text-white">tflaundry2@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-phone-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Kontak</h5>
                            <p class="m-0 text-white">0895414744032</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->
   
    <!-- Pricing Plan Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <h1 class="display-4 text-center mb-5">JENIS LAUNDRY</h1>
            
            <div class="row">
                
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-secondary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h3 class="text-white">KILOAN</h3>
                            <h3 class="display-4 text-white mb-0">
                                <small class="align-top" style="font-size: 25px; line-height: 45px;">Rp 10.000/Kg</small>
                            </h3>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>Baju</p>
                            <p>Celana</p>
                            <p>Jaket</p>
                            <p>-</p>
                        </div>
                        
                    </div>
                </div>
               
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-primary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h3 class="text-white">SATUAN</h3>
                            <h3 class="display-4 text-white mb-0">
                                <small class="align-top" style="font-size: 24px; line-height: 45px;">RP 20.000/Pcs</small>
                            </h3>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>Karpet</p>
                            <p>Badcover</p>
                            <p>Hordeng</p>
                            <p>Boneka</p>
                        </div>
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->


  
    
    <!-- Footer Start -->
    <?php
        include "footer.html";
    ?>
    <!-- Footer End -->
</body>

</html>