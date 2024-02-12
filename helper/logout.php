<?php
session_start();

if(session_destroy()) {
    header("location: ../page/page-login.php");
}
?>