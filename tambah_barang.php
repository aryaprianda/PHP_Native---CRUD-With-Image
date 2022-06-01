<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <title>Belejar CRUD</title>
</head>

<body>
    <div class="container col-md-6 mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Input Data Barang
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-item" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Masukan Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="telp">Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" placeholder="Masukan Harga Beli">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="Masukan Jumlah Stok">
                    </div>
                    <div class="form-group">
                        <label for="kota">Image</label>
                        <input type="file" class="form-control " name="image">
                    </div>
                    <div class="form-group">
                        <label for="kodepos">Jenis</label>
                        <select class="form-control" name="jenis">
                            <option selected>Pilih...</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Realme">Realme</option>
                            <option value="Oppo">Oppo</option>
                            <option value="iPhone">iPhone</option>
                            <option value="Xiaomi">Xiaomi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kodepos">Diskon</label>
                        <input type="text" class="form-control" name="diskon" placeholder="Masukan Diskon">
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>

<?php
    include "koneksi.php";
    if(isset($_POST['simpan'])){
        $nama_barang   = $_POST['nama_barang'];
        $harga_beli   = $_POST['harga_beli'];
        $stok   = $_POST['stok'];

        //upload
        $image  = $_FILES['image']['name'];
        $source = $_FILES['image']['tmp_name'];
        $folder = './image/';
        move_uploaded_file($source, $folder.$image);

        $jenis   = $_POST['jenis'];
        $diskon  = $_POST['diskon'];

        mysqli_query($koneksi, "INSERT INTO tb_barang VALUES('',
            '$nama_barang','$harga_beli','$stok','$image','$jenis','$diskon%'
        )") or die(mysqli_error($koneksi));

        echo "<div align ='center'><h5>Silahkan Tunggu, Data Sedang Disimpan...</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/asset/data_barang.php'>";
    }
?>