<?php 
session_start();

//if(!isset($_SESSION["user"])){
  //header("location:login.php");
  //exit;
//}
  

require 'fungsi.php';







?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Script JS -->
   

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Link css -->
    <link rel="stylesheet" href="../css/produk.css">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/50981b477c.js" crossorigin="anonymous"></script>

    <!-- google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">

    <title> Index </title>
  </head>
  <body>


  <nav class="">
  <div class="logo">
    <ul>
      <li><a href="index.php ">Flower</a></li>
    </ul>
  </div> 

    <ul class="main">
      <li><a class="active" href="produk.php">Produk</a></li>    
      <li><a  class="active" href="contact.php">Contact</a></li>    
      <li><a href="blog.php">Blog</a></li>
      <div class="tutupmenu"><i class="fas fa-times"></i></div>
       
    </ul>

    <ul class="profile">
    <div class="bukamenu"><i class="fas fa-bars"></i></div> 
      
      <li><a href="keranjang.php"><i class="fas fa-shopping-basket"></i></a></li>
      <?php if(isset($_SESSION["user"])) :  ?>
      <li><a href="logout.php" ><i class="fas fa-sign-out-alt"></i></a></li>
      <?php else: ?>
        <li><a href="login.php"><i class="fas fa-user"></i></a></li>
      <?php endif; ?>
    </ul>


  </nav>



        <div class="container content">

           <!-- <section class="hero">
                    <div class="containerhero">
                        <h1>Home</h1>
                        <a href="produk.php" class="tombolhero">Belanja Yuk</a>
                            
                    </div>
                </section> -->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  </div>
                  
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="../img/bungapapancaro1.jpeg" class="d-block w-100 " alt="Bunga Papan">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>BungaPapan</h5>
                        <p>Mau Beli? Klik Tombol Dibawah Ini </p>
                        <a href="kategori1.php" class="btn btn-warning">Beli Disini</a>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <img src="../img/standingflower5r.jpg" class="d-block w-100 " alt="Standing Flower">
                      <div class="carousel-caption d-none d-md-block">
                         <h5>StandingFlower</h5>
                        <p>Mau Beli? Klik Tombol Dibawah Ini </p>
                        <a href="kategori2.php" class="btn btn-warning">Beli Disini</a>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <img src="../img/bouquet3r.jpg" class="d-block w-100 " alt="Handbouquet">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Handbouquet</h5>
                        <p>Mau Beli? Klik Tombol Dibawah Ini </p>
                        <a href="kategori3.php" class="btn btn-warning">Beli Disini</a>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <img src="../img/rangkaianbunga3r.jpg" class="d-block w-100 " alt="Rangkaian Bunga">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Rangkaian Bunga</h5>
                        <p>Mau Beli? Klik Tombol Dibawah Ini </p>
                        <a href="kategori4.php" class="btn btn-warning">Beli Disini</a>
                      </div>
                    </div>

                  </div>

                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>

                <section class="kategori">

                <div class="kategoritextproduk text-center py-5">
                    <h1 class="p-5">Kategori Produk</h1>
                </div>
                
                <div class="grid-list row m-auto text-center">
                    
                    <div class="gambar col-md-3">
                        <a href="kategori1.php"><img src="../img/bungapapan2.jpg" alt="Bunga Papan" class="img-fluid"></a>
                        <p class="h4 text-center">Bunga Papan</p>
                    </div>

                    <div class="gambar col-md-3">
                        <a href="kategori2.php"><img src="../img/standingflower4.jpg" alt="Standing FLower" class="img-fluid"></a>
                        <p class="h4 text-center">Standing Flower</p>
                    </div>

                    <div class="gambar col-md-3">
                        <a href="kategori3.php"><img src="../img/bouquet2.jpg" alt="Bouquet" class="img-fluid"></a>
                        <p class="h4 text-center">Bouquet</p>
                    </div>

                    <div class="gambar col-md-3">
                        <a href="kategori4.php"><img src="../img/rangkaianbunga2.jpg" alt="Rangkaian Bunga" class="img-fluid"></a>
                        <p class="h4 text-center">Rangkaian Bunga</p>
                    </div>

                </div>

                </section>



                <section class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-center m-auto py-5">
                            <h1>Di Toko Bunga Kami </h1>
                            <h6 style="color : #fb3640" class="py-4"> FLOWER </h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <img src="../img/kualitasbunga.jpg" alt="" class="img-fluid mb-3">
                            <h5>Produk Kualitas Terbaik</h5>
                            <p>Dijamin Produk Kualitas Paling Terbaik </p>
                        </div>

                        <div class="col-md-4">
                            <img src="../img/uang.jpg" alt="" class="img-fluid mb-3">
                            <h5>Harga Nyaman Di Dompet</h5>
                            <p>Dijamin Harga Paling Murah </p>
                        </div>

                        <div class="col-md-4">
                            <img src="../img/fresh.jpg" alt="" class="img-fluid mb-3">
                            <h5>Fresh From The Nature</h5>
                            <p>Dijamin Segar Sampai Lebih Dari 1000 tahun Lamanya </p>
                        </div>
                    </div>
                </div>

                </section>
                </div>

                <section class="bottombanner">
                    <div class="container">
                        <div class="bannerhero">
                            <p>Home</p>
                        </div>
                        </div>
                </section>


        </div>









<footer class="footer">
  <div class="container">
    <div class="footeritem">

    

      <div class="footercol">
        <p class="h4">Link Gan</p>
        <ul class="link">
          <li><a href="">Tentang Kami</a></li>
          <li><a href="">FAQ</a></li>
          <li><a href="">Terms & conditions</a></li>
          <li><a href="">Contact Us</a></li>
        </ul>
      </div> 

      <div class="footercol">
        <p class="h4">Link Gan</p>
        <ul class="link">
          <li><a href="">Tentang Kami</a></li>
          <li><a href="">FAQ</a></li>
          <li><a href="">Terms & conditions</a></li>
          <li><a href="">Contact Us</a></li>
        </ul>
      </div> 

      

      <div class="footercol">
        <p class="h4">Sosial Media</p>
        <ul class="link ">
          <li><a href="https://www.facebook.com/ichan.jelek.7">Facebook</a></li>
          <li><a href="https://www.instagram.com/pa_thetic_/">Instagram</a></li>
          <li><a href="https://twitter.com/Maulana2134">Twitter</a></li>
          <li><a href="https://github.com/mrexo321">Github</a></li>
        </ul>
      </div>

    </div>
  </div>

  <div class="whatsapp fixed-bottom ms-auto end-0">
          <a href="https://wa.me/628888730173"><img src="../img/waicon.png" alt="Logo Whatsapp" style="width:4rem;"></a>
      </div>
</footer>












    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

  </body>
</html>