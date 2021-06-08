<?php
session_start();
if(!isset($_SESSION["admin"])){

    
    header("location:index.php");
    exit;
  }
   require 'fungsi.php';

   $id = $_GET["id"];

   $query = "SELECT * FROM produk WHERE idproduk = $id ";
   $produk = mysqli_query($koneksi,$query);
   $resultproduk = mysqli_fetch_assoc($produk);
   //var_dump($resultproduk);
   //die;

   


    if(isset($_POST["ubahproduk"])){
        
       

        if (ubah($_POST) > 0){
            echo "<script> alert('Produk Berhasil Diubah'); document.location.href = 'admin.php'; </script> ";
        }else{
            echo "<script> alert('Produk Gagal Diubah'); document.location.href = 'admin.php'; </script> ";
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

    <title>Ubah Produk</title>
  </head>
  <body>

        <div class="container">
           <div class="col-md-6 m-auto ">
           <form method="post" action="">

                <input type="hidden" name="idproduk" value="<?= $resultproduk["idproduk"]; ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">File Gambar</label>
                    <input type="file" value="<?= $resultproduk["gambarproduk"] ?>"  name="gambarproduk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"required >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Produk :</label>
                    <input type="text" value="<?= $resultproduk["namaproduk"] ?>" name="namaproduk" class="form-control" id="exampleInputPassword1" required >
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Deskripsi Produk :</label>
                    <input type="text" value="<?= $resultproduk["descproduk"] ?>" name="descproduk" class="form-control" id="exampleInputPassword1" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Harga Produk :</label>
                    <input type="text" value="<?= $resultproduk["hargaproduk"] ?>" name="hargaproduk" class="form-control" id="exampleInputPassword1" required >
                </div>

                    <div class="col text-center">
                    <button type="submit" name="ubahproduk" class="btn btn-primary ">Ubah Produk</button>
                    </div>

                </form>
           </div>
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



















