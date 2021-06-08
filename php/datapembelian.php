<?php
session_start();

require 'fungsi.php';





if(!isset($_SESSION["admin"])){

  header("location:index.php");
  exit;
}

if(isset($_POST["cari"])){
  $produk = cari($_POST["pencarian"]);

  //var_dump($produk);
  

}

//var_dump($produk);
//die;

$datapembelian = query("SELECT * FROM pembelianproduk");
//var_dump($datapembelian);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Data Pembelian Produk</title>
  </head>
  <body>
    <h1>Data Pembelian Produk</h1>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID Pembelian</th>
                            <th scope="col">ID Produk</th>
                            <th scope="col">Jumlah Produk</th>
                            
                            
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($datapembelian as $dp) : ?>
                            <tr>

                            <th scope="row"><?= $dp["idpembelianproduk"]; ?></th>
                            <td><?= $dp ["id_pembelian"]; ?></td>
                            <td><?= $dp ["id_produk"]; ?></td>
                            <td><?= $dp["jumlah"]; ?></td>
                            <td></td>
                            
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>
















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