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

    <title>Admin Page</title>
  </head>
  <body>

      <h1 class="text-decoration-underline text-center">Halaman Admin</h1>

        <div class="col-md-6 m-auto my-5">
            <div class="row">
              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                  
                  <a href="tambahproduk.php" class="btn btn-outline-dark">Tambah Produk disini!</a>     
                  <a href="tambahadmin.php" class="btn btn-outline-dark">Tambah Admin/User</a>
                  <a href="datapembelian.php" class="btn btn-outline-dark">Data Pembelian</a>
                  <a href="masukanuser.php" class="btn btn-outline-dark">Masukan User </a>
                  <a href="datablog.php" class="btn btn-outline-dark">Data Blog</a>
                  <a href="logout.php" class="btn btn-outline-danger">Logout</a>
              </div>
            </div>
        
      </div>

    <div class="form text-center">
                <form action="" class="text-center" method="post">
                      <input type="text" name="pencarian" placeholder="Cari Produk">
                      <button type="submit" name="cari" class="tombolsearch"><i class="fas fa-search"></i></button>
                       
                    </form>
    </div>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Idproduk</th>
      <th scope="col">NamaProduk</th>
      <th scope="col">Descripsi Produk</th>
      <th scope="col">Harga Produk</th>
      <th scope="col">Gambar Produk</th>
      <th scope="col">Kategori Produk</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($produk as $pro) : ?>
    <tr>
      <th scope="row"><?= $pro["idproduk"]; ?></th>
      <td><?= $pro ["namaproduk"]; ?></td>
      <td><?= $pro ["descproduk"]; ?></td>
      <td>Rp.<?= number_format($pro["hargaproduk"]); ?></td>
      <td><img src="../img/<?=$pro["gambarproduk"]; ?>" alt="bunga" class="img-fluid" style="width:100px"></td>
      <td><?= $pro["kategoriid"]; ?></td>
      <td>
        
        <a class="btn btn-warning" onclick="return confirm('Yakin Ingin Menghapus?');" href="hapus.php?id=<?=$pro["idproduk"];?>">Hapus</a>
        <a class="btn btn-secondary" href="ubah.php?id=<?=$pro["idproduk"];?>">Ubah</a>
        
    </td>
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