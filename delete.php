<?php
    //MUHAMMAD ARYA PRIANDA
    //18710068

    include "koneksi.php";
    $id = $_GET['id_barang'];
    $ambildata = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/asset/data_barang.php'>";
?>