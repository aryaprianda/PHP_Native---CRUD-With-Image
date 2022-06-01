<?php
    //MUHAMMAD ARYA PRIANDA
    //18710068

    $koneksi = mysqli_connect("localhost", "root", "", "db_barang");

    if(mysqli_connect_errno($koneksi)){
        echo "Koneksi Gagal". mysqli_connect_error();
    }
?>