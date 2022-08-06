<?php
    require './util/DbConnection.php';
    session_start();
    if(isset($_SESSION['email'])) {
        header('location: index.php', true, 301);
        exit();
    }
    $login_result = -1;
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = md5($_POST['pass']);
        $stmt = $connect->prepare("SELECT * FROM tb_user WHERE `email`=? AND `password`=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_object();
        if($row == null) {
            $login_result = 0;
        } else {
            $_SESSION['email'] = $row->email;
            $_SESSION['password'] = $_POST['pass'];
            $_SESSION['nama'] = $row->nama;
            $_SESSION['telp'] = $row->telp;

            header('location: index.php', true, 301);
            exit();
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Toko Surya Dewata</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
        </li>
        <?php if(!isset($_SESSION['email'])): ?>
        <li class="nav-item">
            <a class="nav-link active" href="#">Login</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="#">Riwayat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
        </li>
        <?php endif; ?>
        </ul>
    </div>
    </nav>

    <div class="container-fluid">
    <?php if($login_result == 0): ?>
    <div class="row justify-content-center">
        <div class="col my-3">
            <div class="alert alert-warning" role="alert">
                Login gagal, User tidak terdaftar
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row justify-content-center" style="margin-top: 50px; margin-bottom: 130px;">
        <div class="card mx-3" style="width: 25rem;">
            <h3 class="card-title mt-3 text-center">
                Login
            </h3>
            <div class="card-body">
            <form method="post" enctype="application/x-www-form-urlencoded">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
                <button type="submit" class="btn btn-primary mb-3" id="login" name="login" value="login">Login</button>
                <p>Tidak punya akun? <span><a href="register.php">Register disini</a></span></p>
            </form>
            </div>
        </div>
    </div>
    </div>

    <footer class="sticky-footer bg-dark" style="padding: 1rem; position: fixed; bottom: 0; width: 100%;">
        <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span class="text-white">Copyright &copy; Gede Yoga Suandika/201943501862</span>
        </div>
        </div>
    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>