<?php
require_once 'koneksi.php';
require_once '../page/page-login.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $koneksi;
    $select = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND pass = '$pass'");
    $row = mysqli_fetch_array($select);

    if (is_array($row)) {
        $_SESSION["username"] = $row['username'];
        $_SESSION["pass"] = $row['pass'];
    } else {
        echo "<script>
        alert('Invalid username or password!');
        document.location='page-login.php';
        </script>";
    }
    if (isset($_SESSION["username"])) {
        header("Location:../page/page-landing.php");
    }
}
