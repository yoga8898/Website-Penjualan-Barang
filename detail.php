<?php
    require './util/DbConnection.php';
    session_start();
    if(!isset($_SESSION['email'])) {
        header('location: login.php', true, 301);
        exit();
    }
    $barang = null;
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $connect->prepare("SELECT * FROM tb_barang WHERE `id`=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $barang = $result->fetch_object();
        $stmt->close();
    }
    if(isset($_POST['checkout'])) {
        $email = $_SESSION['email'];
        $id_barang = intval($_GET['id']);
        $qty = intval($_POST['qty']);
        $total = $qty*$barang->harga;
        $bayar = intval($_POST['bayar']);
        $stmt = $connect->prepare("INSERT INTO tb_beli(`email`,`barang`,`qty`,`total`,`bayar`) VALUES(?,?,?,?,?)");
        $stmt->bind_param("siiii", $email, $id_barang, $qty, $total, $bayar);
        $stmt->execute();
        echo "<script>alert(\"Berhasil melakukan pembelian barang!\");window.location.href=\"index.php\"</script>";
    }
    if($barang == null) {
        header('location: index.php', true, 301);
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
        <div class="col-12 col-md-4 mt-3">
            <img src="<?=$barang->gambar?>" class="card-img-top" style="object-fit: contain; width: 100%; height: 50vh;">
        </div>
        <div class="col-12 col-md-8 mt-3">
            <h3 class="mb-3"><?=$barang->nama?></h3>
            <h5 class="mb-3 text-secondary">Rp. <?=$barang->harga?></h3>
            <p><?=nl2br($barang->keterangan)?></p>
            <form method="post" enctype="application/x-www-form-urlencoded">
                <div class="form-group mb-3">
                    <label for="qty">Jumlah Pembelian</label>
                    <input type="number" min="1" class="form-control" id="qty" name="qty" required>
                </div>
                <div class="form-group mb-3">
                    <label for="total">Total (Rp)</label>
                    <input type="number" class="form-control" id="total" name="total" value="0" min="0" readonly required>
                </div>
                <div class="form-group mb-3">
                    <label for="bayar">Bayar (Rp)</label>
                    <input type="number" class="form-control" id="bayar" name="bayar" value="0" min="0" required>
                </div>
                <div class="form-group mb-3">
                    <label for="kembali">Kembali (Rp)</label>
                    <input type="number" class="form-control" id="kembali" name="kembali" value="0" readonly required>
                </div>
                <button type="submit" class="btn btn-primary mb-3" id="checkout" name="checkout" value="checkout">Beli</button>
            </form>
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

    <script>
        $(document).ready(function() {
            let harga = <?=$barang->harga?>;
            $("#qty").on("input", function() {
                let qty = $(this).val();
                let total = qty*harga;
                $("#total").val(total);
                $("#bayar").attr({
                    "min": total
                });
            });
            $("#bayar").on("input", function() {
                let bayar = $(this).val();
                let kembali = bayar-$("#total").val();
                $("#kembali").val(kembali);
            });
        });
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>