<?php 
session_start(); // Mulai session

// Hapus semua session (tanda login)
session_destroy();

// Balikin ke login
header("location:login.php?pesan=logout");
?>
