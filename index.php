<?php
    require './util/DbConnection.php';
    session_start();
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
            <a class="nav-link active" href="#">Beranda</a>
        </li>
        <?php if(!isset($_SESSION['email'])): ?>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="riwayat.php">Riwayat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <?php endif; ?>
        </ul>
    </div>
    </nav>

    <div class="container-fluid" style="margin-bottom: 70px;">
    <div class="row justify-content-center">
        <?php
            $stmt = $connect->prepare("SELECT * FROM tb_barang");
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_object()):
        ?>
        <div class="col-12 col-md-4 my-3">
            <a href="detail.php?id=<?=$row->id?>" class="text-decoration-none">
            <div class="card shadow">
                <img src="<?=$row->gambar?>" class="card-img-top" style="object-fit: contain; width: 100%; height: 15vw;">
                <div class="card-body">
                    <h5 class="card-title text-dark"><?=$row->nama?></h5>
                    <p class="card-text text-dark">Rp. <?=$row->harga?></p>
                </div>
            </div>
            </a>
        </div>
        <?php endwhile; ?>
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