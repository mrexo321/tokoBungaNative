<?php
require '../fungsi.php';

$produk = $_GET["id"];

if(isset($produk)){
  
  $result = mysqli_query($koneksi , "SELECT * FROM produk WHERE idproduk = '$produk' ") ;
  
    if(mysqli_num_rows($result) > 0){
      $dataproduk = mysqli_fetch_assoc($result);
      //print_r($row);
    }
    else{
      //echo "<script> alert ('Produk Yang Dicari Tidak Ada !') </script>";
      //echo "<script> location:produk.php </script>";
      header("location:../produk.php");
    }
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/style.css">

    <title>Hello, world!</title>
  </head>
 <!-- Navbar -->
  <nav class="">
  <div class="logo">
    <ul>
      <li><a href="index.php ">Flower</a></li>
    </ul>
  </div> 

    <ul class="main">
      <li><a href="produk.php">Produk</a></li>    
      <li><a href="contact.php">Contact</a></li>    
      <li><a href="blog.php">Blog</a></li>
      <div class="tutupmenu"><i class="fas fa-times"></i></div>
       
    </ul>

    <ul class="profile">
    <div class="bukamenu"><i class="fas fa-bars"></i></div> 
      <li><a href="login.php"><i class="fas fa-user"></i></a></li>
      <li><a href="keranjang.php"><i class="fas fa-shopping-basket"></i></a></li>
    </ul>


  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-4 m-auto">
          <table class="table table-bordered">
          <tr>
            <td colspan="2"><img src="../../img/<?= $dataproduk ["gambarproduk"]; ?>" alt=""></td>
          </tr>
          <tr>
            <td>Nama Produk : </td>
            <td><?= $dataproduk["namaproduk"]; ?></td>
          </tr>
          <tr>
            <td>Descripsi Produk : </td>
            <td><?= $dataproduk["descproduk"]; ?></td>
          </tr>

          <tr>
            <td>Harga Produk : </td>
            <td><?= $dataproduk["hargaproduk"]; ?></td>
          </tr>
          </table>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
  <div class="container">
    <div class="footeritem">

      <div class="footercol">
        <p class="h4 ">Link Gan</p>
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
        <ul class="link">
          <li><a href="https://www.facebook.com/ichan.jelek.7">Facebook</a></li>
          <li><a href="https://www.instagram.com/pa_thetic_/">Instagram</a></li>
          <li><a href="https://twitter.com/Maulana2134">Twitter</a></li>
          <li><a href="https://github.com/mrexo321">Github</a></li>
        </ul>
      </div>

    </div>
  </div>
</footer>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>