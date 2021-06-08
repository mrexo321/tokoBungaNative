<?php 
session_start();
require 'fungsi.php';
//if(!isset($_SESSION["user"])){
  //  header("location:login.php");
   // exit;
  //}

$id = $_GET["id"];


$blog = query("SELECT * FROM blog WHERE idblog = $id");

//var_dump($blog);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/50981b477c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style.css">

    <title>View Blog</title>
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

  <div class="row">
        <div class="col-md-6 m-auto my-4">
            <?php foreach ($blog as $blo) : ?>
              <p class="h3 text-center"><?= $blo["namablog"]; ?></p>
              <p class="text-center my-4"><img style="width:200px;" class="img-fluid" src="../img/<?= $blo["gambarblog"]; ?>" alt=""> </p>
              <p class="text-center h6"><?= $blo["isiblogpan"]; ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="whatsapp fixed-bottom ms-auto end-0">
          <a href="https://wa.me/628888730173"><img src="../img/waicon.png" alt="Whatsapp" style="width:4rem;"></a>
      </div>
   
    

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


   