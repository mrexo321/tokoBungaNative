<?php 
session_start();
if(!isset($_SESSION["user"])){
    header("location:login.php");
    
  }
require 'fungsi.php';


if(!isset($_SESSION["karung"])){
  $_SESSION["karung"] = array();
}




if(isset($_POST["addtocart"])){
    if(isset($_SESSION["karung"])){
        $session_array_id = array_column($_SESSION["karung"], "idproduk");

        if(!in_array($_GET["id"] , $session_array_id )){
            $session_array = array( 
                'idproduk' => $_GET["id"],
                "gambarproduk" => $_POST["gambarproduk"],
                "namaproduk" => $_POST["namaproduk"],
                "hargaproduk" => $_POST["hargaproduk"],
                "descproduk" => $_POST["descproduk"],
                "jumlah" => $_POST["qty"]
            );
            $_SESSION["karung"][] = $session_array;
        }
        else{   
         
           $index = array_search($_GET["id"],$session_array_id,true);
           $arrayberisi = $_SESSION["karung"][$index]; 
           $session_array = array( 
               'idproduk' => $_GET["id"],
               "gambarproduk" => $_POST["gambarproduk"],
               "namaproduk" => $_POST["namaproduk"],
               "hargaproduk" => $_POST["hargaproduk"],
               "descproduk" => $_POST["descproduk"],
               "jumlah" => $arrayberisi["jumlah"] + $_POST["qty"]
           );
           $_SESSION["karung"][$index] = array_merge($_SESSION["karung"],$session_array);
          
        }
    }
   
}







        




//echo "<pre>";
//var_dump($_SESSION["karung"]);
//echo "</pre>";



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style.css">

    <script src="https://kit.fontawesome.com/50981b477c.js" crossorigin="anonymous"></script>

    <title>Keranjang</title>
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
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center mb-4">
                <p class="h2 ">Keranjang</p>
                <a href="produk.php" class="btn btn-success">Belanja Lagi </a>
              </div>
            </div>
            <table  class="table table-bordered table-secondary ">
                <thead>
                <tr class="text-center">
                    <th scope="col">Gambarproduk</th>
                    <th scope="col">Nama Produk </th>
                    <th scope="col">Descripsi Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                
                <?php if(!empty($_SESSION["karung"])){ ?>    

                <?php $totalbelanja = 0; ?> 

                <?php foreach($_SESSION["karung"] as $produk)  : ?>
                <?php $hargasementara = $produk["hargaproduk"] * $produk["jumlah"]; ?>
                <tr class="text-center">
                    <td><img src="../img/<?= $produk["gambarproduk"];  ?>" alt="" style="width:100px; height:100px;"></td>
                    <td><?= $produk["namaproduk"];  ?></td>
                    <td><?= $produk["descproduk"];  ?></td>
                    <td>Rp.<?=  number_format( $produk["hargaproduk"]);  ?></td>
                    <td><?= $produk["jumlah"];  ?></td>
                    <td>
                        <a href="keranjang.php?action=hapus&id=<?=$produk["idproduk"]; ?>">
                        <button class="btn btn-danger">Hapus</button>
                        </a>
                    </td>
                </tr>
                <?php $totalbelanja+= $hargasementara; ?>
                <?php endforeach; ?>
        <?php } ?>

                    <tr class="text-center">
                        <td colspan="4">Total Belanja</td>
                        <td>Rp.<?= number_format($totalbelanja); ?></td>
                        <td>
                        <a href="keranjang.php?action=hapussemua">
                            <button class="btn btn-primary">Hapus Semua</button>
                        </a>
                        </td>
                    </tr>
                
                </tbody>
          </table>
        

            <div class="row ">
              <div class="tombol my-4 ">
                 
                  <a href="checkout.php" class="btn btn-primary">Checkout</a>
              </div>
            </div>

          

      </div>
            

            <div class="whatsapp fixed-bottom ms-auto end-0">
               <a href="https://wa.me/628888730173"><img src="../img/waicon.png" alt="Whatsapp" style="width:4rem;"></a>
           </div>
         
      

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





<?php 




if(isset($_GET["action"])){

    if($_GET["action"] == "hapussemua"){
        unset($_SESSION["karung"]);
    }

    
    if($_GET["action"] == "hapus"){

        

        foreach($_SESSION["karung"] as $produk => $value){
            if($value["idproduk"] == $_GET["id"]){
                unset($_SESSION["karung"][$produk]);
                
            }
        }

        
    }
}

if(empty($_SESSION["karung"])){
  echo "<script> alert ('Produk Kosong,Silakan Belanja Dahulu '); 
        document.location.href = 'produk.php'; </script>
  ";
}









?>