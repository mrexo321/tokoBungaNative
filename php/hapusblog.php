<?php 
session_start();

require 'fungsi.php';
if(!isset($_SESSION["admin"])){

    header("location:index.php");
    exit;
  }

$id = $_GET["id"];

    if(hapusblog($id) > 0){
        echo "<script> alert('Blog Berhasil Dihapus') ;
        document.location.href = 'datablog.php';

        </script>";
    }else{
        echo "<script> alert('Blog Gagal Dihapus') ;
        document.location.href = 'datablog.php';

        </script>";
    }


?>