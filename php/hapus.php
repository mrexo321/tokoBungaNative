<?php 
session_start();

require 'fungsi.php';
if(!isset($_SESSION["admin"])){

    header("location:index.php");
    exit;
  }

$id = $_GET["id"];

    if(hapus($id) > 0){
        echo "<script> alert('Produk Berhasil Dihapus') ;
        document.location.href = 'admin.php';

        </script>";
    }else{
        echo "<script> alert('Produk Gagal Dihapus') ;
        document.location.href = 'admin.php';

        </script>";
    }


?>