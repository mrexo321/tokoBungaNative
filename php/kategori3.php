<?php 
session_start();

require 'fungsi.php';

//if(!isset($_SESSION["user"])){
  //header("location:login.php");
  //exit;
//}

  $produk = query("SELECT * FROM produk WHERE kategoriid = 3");


//$query = "SELECT * FROM produk WHERE kategoriid = 3";

//$produk = mysqli_query($koneksi,$query);

//$resultproduk = mysqli_fetch_assoc($produk);
//var_dump($resultproduk);


if(isset($_POST["cari"])){
    $produk = cari($_POST["pencarian"]);

    //var_dump($produk);
    

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
    <link rel="stylesheet" href="../css/produk.css">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/50981b477c.js" crossorigin="anonymous"></script>

    <!-- google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">

    <title> Produk </title>
  </head>
  <body>

  <!-- Modal -->
  <?php foreach ($produk as $pro) : ?>
    <?php $kategoriid = $pro["kategoriid"]; ?>
    <?php switch ($kategoriid){

           case 1:
            $kategoriid = 'Bunga Papan';
             break;

            case 2:
            $kategoriid = 'Standing Flower';
            break;

            case 3:
            $kategoriid = 'Handbouquet';
            break;

            case 4:
            $kategoriid = 'Rangkaian Bunga';
            break;

              


    } ?>
    
  <div class="modal-wrapper">
    <div id="modal<?=$pro ["idproduk"]; ?>" class= "basemodal m-auto">
        <div class="modalgambar container-fluid">
          <img class="img-fluid" src="../img/<?= $pro["gambarproduk"]; ?>" alt="">
        </div>
        <form method="post" action="keranjang.php?id=<?= $pro["idproduk"]; ?>">

            <div class="modalnama py-2 ">
            <p class="h2"><?=$pro["namaproduk"]; ?></p>                          
            </div>

            <div class="modalharga py-2 ">
            <p class="h4">Rp.<?= $pro ["hargaproduk"];?></p>             
            </div>

            <div class="modaldesc py-4 ">
            <p class="h5"><?= $pro ["descproduk"]; ?></p>
            </div>
            

            <input type="hidden" name="namaproduk" value="<?= $pro["namaproduk"]; ?>">
            <input type="hidden" name="hargaproduk" value="<?= $pro["hargaproduk"]; ?>">
            <input type="hidden" name="descproduk" value="<?= $pro["descproduk"]; ?>">
            <input type="number" name="qty" min="1" value="1" class="form-control" required>

            <div class="tambahkeranjang  py-3 text-center">
              <button class="btn btn-success" type="submit" name="addtocart">tambahkeranjang</button>
            </div>
        </form>
    </div>
  </div>

  <?php endforeach; ?>


    
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
    <div class="container content">
        <section class="hero col-md-12">
            <div class="containerhero">
                <h1>Produk</h1>     
            </div>
        </section>

        <section class="produk">
        <div class="container my-5 text-center">
            <div class="row">
                <div class="col">
                    <h1 class=>Product</h1>
                </div>
            </div>

           
              
                <div class="kategori-wrapper">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                         <a href="kategori1.php" class="link-dark btn btn-outline-secondary">Bunga Papan</a>

                          <a href="kategori2.php" class="link-dark btn btn-outline-secondary">Standing Flower</a>

                          <a href="kategori3.php" class="link-dark btn btn-outline-secondary">Handbouquet</a>

                          <a href="kategori4.php" class="link-dark btn btn-outline-secondary">Rangkaian Bunga</a>
                        </div>
                    </div>
                </div>
               
          

        
          
                <div class="row mt-4 ">
                    <div class="searchbox col-md-6 m-auto">
                        <form action="" class="" method="post">
                          <input type="text" name="pencarian" placeholder="Cari Produk">
                          <button type="submit" name="cari" class="tombolsearch"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                 </div>

              


            <div class="container">

                
                <div class="grid-list row ">
                  <?php foreach ($produk as $pro) : ?>
                   <div class="col-md-4">
                      <div class="card shadow my-3">
                        <img src="../img/<?= $pro ["gambarproduk"];?>" alt="bunga" class="img-fluid">
                        <div class="card-body">
                            <div class="card-title">
                              <p class="h5"><?= $pro["namaproduk"]; ?></p>
                              
                              <button onclick="showmodal(<?= $pro ['idproduk'];   ?>)" class="btn btn-success">Detail</button>
                            </div>
                        </div>
                      </div>
                   </div>
                  <?php endforeach; ?>  
                </div>
               
                          
                   
                        
                
            </div>

           <!-- <div class="page ">
                <div class="col m-auto">
                    <ul>
                        <li><button><i class="fas fa-arrow-left"></i></button></li>
                        <li>Halaman ... Dari ...</li>
                        <li><button><i class="fas fa-arrow-right"></i></button></li>
                    </ul>
                </div>
                    
            </div> -->
                

            </div>
        </div>
        </section>

        <section class="bottombanner">
        <div class="container">
                <div class="bannerhero">
                    <p>Produk</p>
                </div>
        </div>
        </section>




    </div>

  <footer class="footer">
  <div class="container">
    <div class="footeritem">

      <div class="footercol">
        <p class="h4 ">Link</p>
        <ul class="link">
          <li><a href="">Tentang Kami</a></li>
          <li><a href="">FAQ</a></li>
          <li><a href="">Terms & conditions</a></li>
          <li><a href="">Contact Us</a></li>
        </ul>
      </div>

      <div class="footercol">
        <p class="h4">Link </p>
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

  <div class="whatsapp fixed-bottom ms-auto end-0">
          <a href="https://wa.me/628888730173"><img src="../img/waicon.png" alt="Whatsapp" style="width:4rem;"></a>
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

