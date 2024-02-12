<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "uas_web";

$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
?>