<?php


$koneksi = mysqli_connect ("localhost" , "root" , "","tokobunga2");

$produk = query("SELECT * FROM produk");



function query ($query){
    global $koneksi;
    $resultproduk = mysqli_query($koneksi, $query);
    $wadahproduk = [];
    while($produk = mysqli_fetch_assoc($resultproduk)){
        $wadahproduk[] = $produk;
    }
    // wadah udah ada isinya
    return $wadahproduk;
}

function daftar($datalogin){
    global $koneksi;
    //$iduser = ($datalogin["id"]);
    $nama = stripslashes($datalogin["nama"]);
    $alamat = stripslashes($datalogin["alamat"]);
    $notelp = stripslashes($datalogin["notelp"]);
    $email = strtolower(stripslashes($datalogin["email"]));
    $password = mysqli_real_escape_string($koneksi,$datalogin["password"]);
    $password2 = mysqli_real_escape_string($koneksi,$datalogin["password2"]);

    //cek username
    $resultemail = mysqli_query($koneksi,"SELECT email FROM user WHERE email = '$email'");
    $resulttelp = mysqli_query($koneksi,"SELECT notelp FROM user WHERE notelp = '$notelp'");
    if (mysqli_fetch_assoc($resultemail)){
        echo "<script> alert('Username Sudah Terdaftar') </script>";

        return false;
    }
    if(mysqli_fetch_assoc($resulttelp)){
        echo "<script> alert('Nomor Telpon Sudah Terdaftar') </script>";
        return false;
    }

    if($password !== $password2){
        echo "<script> alert('Konfirmasi Password Tidak Sesuai!! ') </script>";
        return false;
    }

    //Hash Password

    $password = password_hash($password,PASSWORD_DEFAULT);

    //Masukin ke tabel user
    mysqli_query($koneksi, "INSERT INTO user  VALUES('','$nama', '$email','$alamat' ,'$notelp' , '$password' , '')");

    return mysqli_affected_rows($koneksi);
}

function tambah ($dataproduk){

        global $koneksi;
        $kategoriproduk = ($dataproduk["kategoriproduk"]);
        $gambarproduk = htmlspecialchars($dataproduk["gambarproduk"]);
        $namaproduk = htmlspecialchars ($dataproduk["namaproduk"]);
        $descproduk =  htmlspecialchars ($dataproduk["descproduk"]);
        $hargaproduk = htmlspecialchars ($dataproduk["hargaproduk"]);

        
        $query = "INSERT INTO produk VALUES ('','$kategoriproduk','$gambarproduk',' $namaproduk', ' $descproduk','$hargaproduk')";

        return mysqli_query($koneksi,$query);
}

function tambahblog ($datablog){

    global $koneksi;
    $namablog = stripslashes($datablog["namablog"]);
    $isiblogpen = stripslashes($datablog["isiblogpen"]);
    $isiblogpan = stripslashes($datablog["isiblogpan"]);
    $gambarblog = stripslashes($datablog["gambarblog"]);
  

    
    $query = "INSERT INTO blog VALUES ('','$namablog','$isiblogpen','$isiblogpan','$gambarblog')";

    return mysqli_query($koneksi,$query);
}


function admin ($dataadmin){
    global $koneksi;
    $nama = stripslashes($dataadmin["namaadmin"]);
    $alamat = stripslashes($dataadmin["alamatadmin"]);
    $notelp = stripslashes($dataadmin["notelpadmin"]);
    $email = strtolower(stripslashes($dataadmin["emailadmin"]));
    $password = mysqli_real_escape_string($koneksi,$dataadmin["passwordadmin"]);
    $password2 = mysqli_real_escape_string($koneksi,$dataadmin["passwordadmin2"]);
    $tipe = $dataadmin["tipe"];

    //cek username / Email
    $resultemail = mysqli_query($koneksi,"SELECT email FROM user WHERE email = '$email'");
    $resulttelp = mysqli_query($koneksi,"SELECT notelp FROM user WHERE notelp = '$notelp'");
    if (mysqli_fetch_assoc($resultemail)){
        echo "<script> alert('Email Sudah Terdaftar') </script>";

        return false;
    }

    if(mysqli_fetch_assoc($resulttelp)){
        echo "<script> alert('Nomor Telpon Sudah Terdaftar') </script>";
        return false;
    }
    
    if($password !== $password2){
        echo "<script> alert('Konfirmasi Password Tidak Sesuai!! ') </script>";
        return false;
    }

    //Hash Password

    $password = password_hash($password,PASSWORD_DEFAULT);

    //Masukin ke tabel user
    mysqli_query($koneksi, "INSERT INTO user  VALUES('','$nama', '$email','$alamat' ,'$notelp' , '$password' , '$tipe')");

    return mysqli_affected_rows($koneksi);
}


function hapus($id){
    global $koneksi;
    $hapus = "DELETE FROM produk WHERE idproduk = $id ";
    mysqli_query($koneksi,$hapus);
    return mysqli_affected_rows($koneksi);
}

function hapusblog($id){
    global $koneksi;
    $hapusblog = "DELETE FROM blog WHERE idblog = $id";
    mysqli_query($koneksi,$hapusblog);
    return mysqli_affected_rows($koneksi);
}


function ubah($dataproduk){
        global $koneksi;

        $id = $dataproduk["idproduk"];
        $kategoriproduk = ($dataproduk["kategoriproduk"]);
        $gambarproduk = htmlspecialchars($dataproduk["gambarproduk"]);
        $namaproduk = htmlspecialchars ($dataproduk["namaproduk"]);
        $descproduk =  htmlspecialchars ($dataproduk["descproduk"]);
        $hargaproduk = htmlspecialchars ($dataproduk["hargaproduk"]);

        
        $query = "UPDATE produk SET
                    kategoriid = '$kategoriproduk',
                    gambarproduk = '$gambarproduk',
                    namaproduk = '$namaproduk',
                    descproduk = '$descproduk',
                    hargaproduk = '$hargaproduk'
                WHERE idproduk = $id
        
        ";
        mysqli_query($koneksi,$query);
        return mysqli_affected_rows($koneksi);
}

function ubahblog($datablog){
    global $koneksi;

    $id = $datablog["idblog"];
    $namablog = $datablog["namablog"];
    $isiblogpen = $datablog["isiblogpen"];
    $isiblogpan = $datablog["isiblogpan"];
    $gambarblog = $datablog["gambarblog"];
   
    
    $query = "UPDATE blog SET
                namablog = '$namablog',
                isiblogpen = '$isiblogpen',
                isiblogpan = '$isiblogpan',
                gambarblog = '$gambarblog'
            WHERE idblog = $id
    
    ";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}





function contact($datacontact){
    global $koneksi;
    $nama = $datacontact["namacontact"];
    $email = $datacontact["emailcontact"];
    $pesan = $datacontact["pesancontact"];
    
    $query = "INSERT INTO contact VALUES ('' , '$nama' , '$email', '$pesan') ";
    return mysqli_query($koneksi,$query);
}

function cari($pencarian){

    $query = "SELECT * FROM produk 
                    WHERE
                namaproduk LIKE '%$pencarian%' 
                
                
                
                
    
    ";
    

    return query($query);
}

function cariblog($pencarianblog){

    $query = "SELECT * FROM blog
                    WHERE
                namablog LIKE '%$pencarianblog%' 
                
                
                
    
    ";
    

    return query($query);
}



?>