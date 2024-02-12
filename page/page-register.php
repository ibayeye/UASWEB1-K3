<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        <?php include "../assets/style/styles.css" ?>
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Register</title>
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
        <form id="registerForm">
            <h1>Register</h1>
            <div class="form-group">
                <label for="username"></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                <i class='bx bxs-user-badge'></i>
            </div>
            <div class="form-group">
                <label for="username"></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button class="btn-register" type="button" onclick="login()">Login</button>
            <div class="register-link">
                <p>Already have an account? <a href="../page/page-login.php">Login</a></p>
            </div>
        </form>
    </div>



</body>

</html>