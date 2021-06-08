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
          foreach($_SESSION["karung"] as $produk){
            
          };
           $cariarray = array_search($produk,$_SESSION["karung"],true);
           $arrayberisi = $_SESSION["karung"][$cariarray]; 
           $session_array = array( 
               'idproduk' => $_GET["id"],
               "gambarproduk" => $_POST["gambarproduk"],
               "namaproduk" => $_POST["namaproduk"],
               "hargaproduk" => $_POST["hargaproduk"],
               "descproduk" => $_POST["descproduk"],
               "jumlah" => $arrayberisi["jumlah"] + $_POST["qty"]
           );
           $_SESSION["karung"][$cariarray] = array_merge($_SESSION["karung"],$session_array);
          
        }
    }
   
}




$ongkir = query("SELECT * FROM ongkir");


$metode = query("SELECT * FROM metode");

        




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

    <title>Checkout</title>
  </head>
  <body>

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
      
      <li><a href="keranjang.php"><i class="fas fa-shopping-basket"></i></a></li>
      <li><a href="logout.php" ><i class="fas fa-sign-out-alt"></i></a></li>
    </ul>


  </nav>
        <div class="container">
            <div class="col-md-12">
                <p class="h3 text-center">Checkout Page</p>        
            </div>
            <table class="table table-bordered table-secondary table-hover ">
                <thead>
                <tr class="text-center">
                    <th scope="col">Gambar produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Descripsi Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Jumlah</th>
                    
                </tr>
                </thead>
                <tbody>
                
                <?php if(!empty($_SESSION["karung"])){ ?>    

                <?php $totalbelanja = 0; ?> 

                <?php foreach($_SESSION["karung"] as $produk)  : ?>
                <?php $hargasementara = $produk["hargaproduk"] * $produk["jumlah"]; ?>
                <tr class="text-center">
                    <th scope="row"><img style="width:100px;" class="img-fluid" src="../img/<?= $produk ["gambarproduk"]; ?>" alt=""></th>
                    <td><?= $produk["namaproduk"];  ?></td>
                    <td><?= $produk["descproduk"];  ?></td>
                    <td>Rp.<?=  number_format( $produk["hargaproduk"]);  ?></td>
                    <td><?= $produk["jumlah"];  ?></td>
                   
                </tr>
                <?php $totalbelanja+= $hargasementara; ?>
                <?php endforeach; ?>
                    <?php } ?>

                    <tr class="text-center">
                        <td colspan="4">Total Belanja</td>
                        <td>Rp.<?= number_format($totalbelanja); ?></td>
                       
                        
                    </tr>
                
                </tbody>
          </table>
        </div>
        <form action="" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col my-4">
                            <p class="h4">DETAIL ORDER</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama : </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="true" value="<?= $_SESSION["nama"]; ?>" placeholder="Enter email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat  : </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="true" value="<?= $_SESSION["alamat"]; ?>" placeholder="Enter email" required>
                            </div>
                        </div>
                    </div>

                    

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telpon : </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="true" value="<?= $_SESSION["notelp"]; ?>" placeholder="Enter email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email : </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly="true" value="<?= $_SESSION["email"]; ?>" placeholder="Enter email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <select class="form-control" name="idongkir">
                                    
                                    <?php foreach($ongkir as $ong) : ?>
                                    <option value="<?= $ong["idongkir"]; ?>" required>
                                        <?= $ong["expedisi"]; ?> - 
                                        <?= $ong["namakota"]; ?> -
                                       Rp.<?= number_format($ong["tarif"]); ?>
                                    
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <select class="form-control" name="metode">
                                    <?php foreach($metode as $meto) : ?>
                                    <option value="<?= $meto["namametode"]; ?>" required>
                                        <?= $meto["namametode"]; ?> - 
                                        <?= $meto["namapenerima"]; ?> -
                                        <?= $meto["nomormetode"]; ?> 
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-4 text-center">
                            <a class="btn btn-warning" href="keranjang.php">Kembali</a>
                            <button type="submit" name="checkout" class="btn btn-primary">Checkout!</button>
                        </div>
                </div>
                    
        </form>


        <!--<div class="whatsapp fixed-bottom ms-auto end-0">
          <a href="https://wa.me/628888730173"><img src="../img/waicon.png" alt="Whatsapp" style="width:4rem;"></a>
        </div>-->
                                    

        <?php
             
        
             if(isset($_POST["checkout"])){
                
                
                $iduser = $_SESSION["iduser"];
                $idongkir = $_POST["idongkir"];
                $idmetode = $_POST["metode"];
                $tanggalorder = date("Y-m-d");
                
                $query = mysqli_query($koneksi,"SELECT * FROM ongkir WHERE idongkir = $idongkir");
                $arrayongkir = mysqli_fetch_assoc($query);
                $tarifongkir = $arrayongkir["tarif"];
                $totalbayar = $totalbelanja + $tarifongkir;
                
                $insertpembelian = "INSERT INTO pembelian VALUES ('','$iduser','$idongkir','$tanggalorder','$totalbayar','$idmetode')";

                $coba = mysqli_query($koneksi,$insertpembelian);

                $idterakhir = mysqli_insert_id($koneksi);

               
                //var_dump($jumlahproduk);
                
                
                 
                    $idproduk = $produk["idproduk"];
                    $jumlahbarang = $produk["jumlah"];
                    $try =  mysqli_query($koneksi,"INSERT INTO pembelianproduk VALUES ('','$idterakhir','$idproduk','$jumlahbarang')");
                    
                    var_dump($try);
                    
                

                
                
                
                 unset($_SESSION["karung"]);
                echo "<script> alert('Checkout Sukses');
                            document.location.href = 'produk.php';
                    </script>";
             }
        
        
        
        
        
        
        ?>



         

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





