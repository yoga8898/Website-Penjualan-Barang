<?php
    require './util/DbConnection.php';
    session_start();
    if(!isset($_SESSION['email'])) {
        header('location: login.php', true, 301);
        exit();
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
            <a class="nav-link active" href="#">Riwayat</a>
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
        <div class="col mt-4 table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Gambar Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Waktu Beli</th>
                <th scope="col">Jumlah Beli</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Nominal Bayar</th>
                <th scope="col">Nominal Kembali</th>
                </tr>
            </thead>
        <tbody class="table-group-divider">
        <?php
            $email = $_SESSION['email'];
            $stmt = $connect->prepare("SELECT `ba`.`gambar`,`ba`.`nama`,`be`.`qty`,`be`.`total`,`be`.`bayar`,`be`.`waktu` FROM tb_beli `be` JOIN tb_barang `ba` ON `be`.`barang`=`ba`.`id` WHERE `email` = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_object()):
        ?>
            <tr>
            <td>
                <img src="<?=$row->gambar?>" class="img-fluid" style="object-fit: contain; width: 100%; height: 15vh;">
            </td>
            <td><?=$row->nama?></td>
            <td><?=$row->waktu?></td>
            <td><?=$row->qty?></td>
            <td>Rp. <?=$row->total?></td>
            <td>Rp. <?=$row->bayar?></td>
            <td>Rp. <?=($row->bayar-$row->total)?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
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