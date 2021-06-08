<?php
session_start();

require 'fungsi.php';



if(!isset($_SESSION["admin"])){

  header("location:index.php");
  exit;
}

$pesan = query("SELECT * FROM contact");



//var_dump($pesan);
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

    <title>Masukan Admin</title>
  </head>
  <body>

  <h1 class="text-decoration-underline text-center">Masukan User</h1>

  <div class="col ">
         <div class="d-inline p-2 ">
            <a href="admin.php" class="btn btn-warning">Kembali</a>
        </div>
    </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nama user</th>
      <th scope="col">Email user</th>
      <th scope="col">Pesan User</th>
     
    </tr>
  </thead>
  <tbody>
  <?php foreach ($pesan as $ps) : ?>
    <tr>
      <th scope="row"><?= $ps["id"]; ?></th>
      <td><?= $ps ["namacontact"]; ?></td>
      <td><?= $ps ["emailcontact"]; ?></td>
      <td><?= $ps ["pesancontact"]; ?></td>
     
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