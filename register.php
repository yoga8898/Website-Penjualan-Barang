<?php
    require './util/DbConnection.php';
    session_start();
    if(isset($_SESSION['email'])) {
        header('location: index.php', true, 301);
        exit();
    }
    $error_msg = null;
    if(isset($_POST['register'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $password = md5($_POST['pass']);
        $kpassword = md5($_POST['kpass']);
        if($password == $kpassword) {
            $stmt = $connect->prepare("INSERT INTO tb_user(`email`,`nama`,`telp`,`password`) VALUES (?,?,?,?);");
            $stmt->bind_param("ssss", $email, $nama, $telp, $password);
            if($stmt->execute()) {
                header('location: login.php', true, 301);
                exit();
            } else {
                $error_msg = "Register gagal, Email sudah terdaftar";
            }
        } else {
            $error_msg = "Register gagal, Konfirmasi password tidak sesuai";
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
            <a class="nav-link" href="login.php">Login</a>
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
    <?php if($error_msg != null): ?>
    <div class="row justify-content-center">
        <div class="col my-3">
            <div class="alert alert-warning" role="alert">
                <?=$error_msg?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row justify-content-center" style="margin-top: 50px; margin-bottom: 130px;">
        <div class="card mx-3" style="width: 25rem;">
            <h3 class="card-title mt-3 text-center">
                Register
            </h3>
            <div class="card-body">
            <form method="post" enctype="application/x-www-form-urlencoded">
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="telp">No. Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp" minlength="10" maxlength="20" required>
                </div>
                <div class="form-group mb-3">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" minlength="8" required>
                </div>
                <div class="form-group mb-3">
                    <label for="kpass">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="kpass" name="kpass" minlength="8" required>
                </div>
                <button type="submit" class="btn btn-primary mb-3" id="register" name="register" value="register">Register</button>
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