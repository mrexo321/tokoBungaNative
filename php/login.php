<?php
session_start();
require 'fungsi.php';

if(isset($_SESSION["login"])){
  header("location:login.php");
  exit;
}

if(isset($_POST["login"])){

  $email = $_POST["email"];
  $password = $_POST["password"];

  $resultlogin = mysqli_query ($koneksi,"SELECT * FROM user WHERE email = '$email'");
  if(mysqli_num_rows($resultlogin) === 1){

   
    
    $rowuser = mysqli_fetch_assoc($resultlogin);
    
    $_SESSION["iduser"] = $rowuser["id"];
    $_SESSION["nama"] = $rowuser["nama"];
    $_SESSION["email"] = $rowuser["email"];
    $_SESSION["alamat"] = $rowuser["alamat"];
    $_SESSION["notelp"] = $rowuser["notelp"];
    $_SESSION["tipe"] = $rowuser["tipe"];

    if(password_verify($password, $rowuser["password"])){
      $_SESSION["user"] = true;
      
      

     
      echo "<script> alert('Anda Berhasil Login!');
            document.location.href ='sesilogin.php';
      </script>";
    } 
  }
  echo "<script> alert('Gagal Login, Username Atau Password Salah');
            document.location.href='login.php';
      </script> ";
  
}



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
    <link rel="stylesheet" href="../css/style.css">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/50981b477c.js" crossorigin="anonymous"></script>

    <!-- google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">

    <title> Login </title>
  </head>
  <body>
    
  <nav class="">
    <div class="logo">
      <ul>
        <li><a href="index.php ">Flower</a></li>
      </ul>
    </div> 

      <ul class="main">
        
        <li><a href="produk.php" id="">Produk</a></li>    
        <li><a href="contact.php">Contact</a></li>    
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


    <!-- Content -->
    <div class="content">

                <div class="container">
                <h1 class="text-decoration-underline text-center">Login</h1>
                    <div class="row">
                        <div class=" col-sm-4 m-auto ">
                        <form action="" method="POST">
                             
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="col text-center">
                            <button type="submit" name="login" class="btn btn-primary">Login </button>
                            
                            </div>
                        </form>
                       </div>                     
                    </div>
                </div>    

                <div class="row"> 
                    <div class="col text-center my-4">
                    <a href="registrasi.php" class="text-decoration-none">Belum Punya Akun? Registrasi Disini</a>
                    </div>
                </div>


          

    </div>

  <footer class="footer mt-4 ">
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

    <script src="../js/script.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

  </body>
</html>