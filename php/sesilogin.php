<?php 

session_start();
require 'fungsi.php';

if (isset($_SESSION["email"])){

    if($_SESSION["tipe"] == 0){
        
        header("location:index.php?");
    }


    if($_SESSION["tipe"] == 1 ){

        $_SESSION["admin"] = true;
        
        header("location:admin.php");

    }

}

?>