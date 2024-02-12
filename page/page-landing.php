<?php
require_once '../helper/koneksi.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        <?php include "../assets/style/styles.css" ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>

<body>
    <header class="header">
        <a href="page-landing.php" class="logo">Toko Xyz</a>
        <nav class="navbar">
            <a href="../page/index.php">Go to Dashboard ></a>
        </nav>
    </header>

    <img src="../assets/img/bg-main.jpg" alt="">

    <div class="hero">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-5">
                    <?php
                    $currentUser = $_SESSION['username'];
                    $sql = "SELECT * FROM user WHERE username = '$currentUser' ";

                    $gotResult = mysqli_query($koneksi, $sql);

                    if ($gotResult) {
                        if (mysqli_num_rows($gotResult) > 0) {
                            while ($row = mysqli_fetch_array($gotResult)) {
                                // print_r($row['username']);
                    ?>
                                <p class="card-text">Halo <?= $row['nama']; ?>, Welcome to Inventory Website Toko Xyz!</p>
                                <p class="card-text">Optimize your business efficiency today! Explore comprehensive inventory management solutions here.
                                    Start your journey towards success with us now!</p>
                    <?php
                            }
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>