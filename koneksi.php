<?php
$koneksi = mysqli_connect("127.0.0.1","root","mrfeng12","db_optrixx");

if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>