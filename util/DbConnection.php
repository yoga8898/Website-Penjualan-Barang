<?php
    $connect = new mysqli("localhost", "root", "", "mp_2022_barang");

    if ($connect->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }