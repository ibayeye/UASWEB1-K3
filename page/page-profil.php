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
    <title>Profil</title>
</head>

<body>
    <header class="header">
        <a href="page-landing.php" class="logo">Toko Xyz</a>
        <nav class="navbar">
            <i class='bx bxs-user' onclick="toggleMenu()"></i>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <a href="../page/page-profil.php" class="sub-menu-link">
                        <p>Profil</p>
                    </a>
                    <a href="../helper/logout.php" class="sub-menu-link">
                        <p>Logout</p>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card m-lg-2">
                    <div class="card-header">
                        Profil
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form method="post">
                                <?php
                                $currentUser = $_SESSION['username'];
                                $sql = "SELECT * FROM user WHERE username = '$currentUser' ";

                                $gotResult = mysqli_query($koneksi, $sql);

                                if ($gotResult) {
                                    if (mysqli_num_rows($gotResult) > 0) {
                                        while ($row = mysqli_fetch_array($gotResult)) {
                                            // print_r($row['username']);
                                ?>
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="uname" value="<?= $row['username']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="nama" value="<?= $row['nama']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" name="email" value="<?= $row['email']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">No Handphone</label>
                                                <input type="text" name="no_hp" value="<?= $row['no_hp']; ?>" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="text-center">
                                                    <hr>
                                                    <a href="index.php" class="btn btn-danger">Back</a>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>

                            </form>
                        </div>
                    </div>
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