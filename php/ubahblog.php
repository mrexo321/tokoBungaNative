<?php
session_start();
if(!isset($_SESSION["admin"])){

    
    header("location:index.php");
    exit;
  }
   require 'fungsi.php';

   $id = $_GET["id"];

   $blog = query("SELECT * FROM blog WHERE idblog = $id ")[0];
   //var_dump($blog);
   
   

   


    if(isset($_POST["ubahblog"])){
        
       

        if (ubahblog($_POST) > 0){
            echo "<script> alert('Blog Berhasil Diubah'); document.location.href = 'ubahblog.php'; </script> ";
        }else{
            echo "<script> alert('Blog Gagal Diubah'); document.location.href = 'ubahblog.php'; </script> ";
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

    <title>Ubah Blog</title>
  </head>
  <body>

        <div class="container">
           <div class="col-md-6 m-auto ">
           <form method="post" action="">

                <input type="hidden" name="idblog" value="<?= $blog["idblog"]; ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Blog : </label>
                    <input type="text" value="<?= $blog["namablog"] ?>"  name="namablog" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"required >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Isi Blog Pen:</label>
                    <input type="text" value="<?= $blog["isiblogpen"] ?>" name="isiblogpen" class="form-control" id="exampleInputPassword1" required >
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Isi Blog Pan:</label>
                    <input type="text" value="<?= $blog["isiblogpan"] ?>" name="isiblogpan" class="form-control" id="exampleInputPassword1" required >
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Gambar Blog:</label>
                    <input type="file" value="<?= $blog["gambarblog"] ?>" name="gambarblog" class="form-control" id="exampleInputPassword1" required>
                </div>

               

                    <div class="col text-center">
                    <button type="submit" name="ubahblog" class="btn btn-primary ">Ubah Blog</button>
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



















