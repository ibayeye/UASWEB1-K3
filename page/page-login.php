<?php
require_once '../helper/koneksi.php';
require_once '../helper/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        <?php include "../assets/style/styles.css" ?>
    </style>

    <script>
        <?php include "../services/login.js" ?>
    </script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>

<body>
    <header class="header">
        <a href="index.html" class="logo">Toko Xyz</a>
        <nav class="navbar">
            <a href="../page/page-login.php">Login</a>
            <a href="../page/page-register.php">Register</a>
        </nav>
    </header>

    <div class="wrapper">
        <form id="loginForm" method="post">
            <h1>Login</h1>
            <div class="form-group">
                <label for="username"></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" id="password" name="pass" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password</a>
            </div>
            <input id="ibtn" type="submit" name="login" value="login">
            <div class="register-link">
                <p>Dont have an account? <a href="../page/page-register.php">Register</a></p>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- <script>
        function login() {

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            const formData = new FormData();
            formData.append('user', username);
            formData.append('pwd', password);

            axios.post('https://kakasualan.000webhostapp.com/login.php', formData).then(response => {
                    console.log(response)

                    if (response.data.status == 'success') {

                        const sessionToken = response.data.session_token;
                        localStorage.setItem('session_token', sessionToken);
                        window.location.href = 'index.php';
                    } else {
                        alert('Maaf Login Gagal, cek ulang username dan password anda!');
                    }
                })
                .catch(error => {
                    console.error('Error during login:', error);
                });
        }
    </script> -->

</body>



</html>