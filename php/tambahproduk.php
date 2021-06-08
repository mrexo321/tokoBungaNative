<?php

session_start();
$_SESSION["admin"];

if(!isset($_SESSION["admin"])){

    header("location:index.php");
    exit;
  }


   require 'fungsi.php';

    if(isset($_POST["tambahproduk"])){
        

        if (tambah($_POST) > 0){
            echo "<script> alert('Produk Berhasil Ditambahkan'); 
                    document.location.href = 'admin.php'; </script>
            ";
        }else{
            echo "<script> alert('Produk Gagal Ditambahkan'); 
                    document.location.href = 'admin.php'; </script>
            ";
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

    <title>Tambah Produk</title>
  </head>
  <body>
   
    <form method="post" action="">
                <p class="h1 text-decoration-underline text-center">TAMBAH DATA PRODUK</p>
                        <div class=" col-sm-4 m-auto ">
                             <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">File Gambar</label>
                                 <input type="file" name="gambarproduk" class="form-control" id="gambarproduk" aria-describedby="emailHelp" required>
                             </div>

                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Nama Produk</label>
                                 <input type="text" name="namaproduk" class="form-control" id="exampleInputPassword1" required>
                             </div>
 
                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Deskripsi Produk</label>
                                 <input type="text" name="descproduk" class="form-control" id="exampleInputPassword1" required>
                             </div>

                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Harga Produk</label>
                                 <input type="text" name="hargaproduk" class="form-control" id="exampleInputPassword1" required>                                  
                                
                             </div>

                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Kategori Produk</label>
                                 <select class="form-control" name="kategoriproduk" id="" required>
                                 
                                 <option value="1">Bunga Papan</option>
                                 <option value="2">Standing Flower</option>
                                 <option value="3">Handbouquet</option>
                                 <option value="4">Rangkaian Bunga</option>
                                 </select>                               
                                 </div>
                             </div>

 
                             
                             <div class="col text-center">

                                <div class="d-inline p-2 ">
                                <a href="admin.php" class="btn btn-warning">Kembali</a>
                                </div>

                                <div class="d-inline p-2 ">
                                <button type="submit" name="tambahproduk" class="btn btn-primary">Tambah Data</button>
                                 </div>

                             </div>
                    </div>

    </form>

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



<!--

                



                              



 -->