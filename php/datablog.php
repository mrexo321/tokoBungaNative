<?php
session_start();

require 'fungsi.php';


$blog = query("SELECT * FROM blog");



if(!isset($_SESSION["admin"])){

  header("location:index.php");
  exit;
}

if(isset($_POST["cariblog"])){
    $blog = cariblog($_POST["pencarianblog"]);
  
   
    
  
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

    <script src="https://kit.fontawesome.com/50981b477c.js" crossorigin="anonymous"></script>

    <title>Admin Page</title>
  </head>
  <body>

      <h1 class="text-decoration-underline text-center">Halaman Data Blog</h1>

  <div class="list">
        <div class="link text-center my-4">  
            <a href="admin.php" class="btn btn-warning">Kembali</a>
            <a href="tambahblog.php" class="btn btn-info">Tambah Blog/Berita</a>
            <a href="datablog.php" class="btn btn-dark">Data Blog</a>
            <a href="logout.php" class="btn btn-primary">Logout</a>
          </div>
    </div>

    <div class="form text-center">
                <form action="" class="text-center" method="post">
                      <input type="text" name="pencarianblog" placeholder="Cari Blog">
                      <button type="submit" name="cariblog" class="tombolsearch"><i class="fas fa-search"></i></button>
                       
                    </form>
    </div>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">IdBlog</th>
      <th scope="col">Nama Blog</th>
      <th scope="col">Isi Blog Depan</th>
      <th scope="col">Gambar Blog</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($blog as $blo) : ?>
    <tr>
      <th scope="row"><?= $blo["idblog"]; ?></th>
      <td><?= $blo ["namablog"]; ?></td>
      <td><?= $blo ["isiblogpen"]; ?></td>
      <td><img src="../img/<?=$blo["gambarblog"]; ?>" alt="bunga" class="img-fluid" style="width:100px"></td>
      <td>      
        <a class="btn btn-warning" onclick="return confirm('Yakin Ingin Menghapus?');" href="hapusblog.php?id=<?= $blo["idblog"];?>">Hapus</a>
        <a class="btn btn-secondary" href="ubahblog.php?id=<?=$blo["idblog"];?>">Ubah</a>  
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