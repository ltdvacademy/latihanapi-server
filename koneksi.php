<?php

// inisialisasi mysql

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "";

// inisialisasi mysql
// (DISI)

// pengecekan apakah database tersambung atau tidak
if(!$db){
    // jika tidak tersambung
    die("Gagal terhubung ke database! ". mysqli_connect_error());
}

?>