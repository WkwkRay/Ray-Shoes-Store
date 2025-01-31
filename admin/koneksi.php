<?php
$host = "localhost";// ip server
$user = "root";	    // username untuk ke DB Server
$pass = "";	        // password untuk ke DB Server
$db   = "db_onlineshop";// nama database

$kon = mysqli_connect($host, $user, $pass, $db);

/* Cuma buat ngetes doank */
/*if($kon){
  echo "Terkoneksi dengan MySQL Server <br>";
  echo "Database $db bisa diakses";
}else{
  echo "Gagal Koneksi";
}*/
?>