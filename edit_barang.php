<!--
  MUHAMMAD ARYA PRIANDA
  18710068
-->

<?php
    include "koneksi.php";
    $id = $_GET['id_barang'];
    $ambildata = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id'");
    $data = mysqli_fetch_array($ambildata);
?>

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
    <script src="js/jquery-3.4.1.min.js"></script>
    <title>Belejar CRUD</title>
</head>

<body>
    <div class="container col-md-6 mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Edit Data Barang
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-item" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama_barang"
                            value="<?php echo $data['nama_barang'];?>" placeholder="Masukan Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="telp">Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli"
                            value="<?php echo $data['harga_beli'];?>" placeholder="Harga Beli">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Stok</label>
                        <input type="number" class="form-control" name="stok" value="<?php echo $data['stok'];?>"
                            placeholder="Stok Barang">
                    </div>
                    <div class="form-group">
                        <label for="kota">Image</label>
                        <div class="row">
                            <input type="text" class="form-control col-md-4 ml-3" value="<?php echo $data['image'];?>"
                                placeholder="Masukan kota" disabled>

                            <input type="file" class="form-control col-md-4 ml-2" name="image">

                            <button type="button" class="btn btn-primary col-md-3 ml-3" data-toggle="modal"
                                data-target="#modal">
                                Preview Image
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control" name="jenis">
                            <option value="<?php echo $data['jenis'];?>"><?php echo $data['jenis'];?></option>
                            <option value="Samsung">Samsung</option>
                            <option value="Realme">Realme</option>
                            <option value="Oppo">Oppo</option>
                            <option value="iPhone">iPhone</option>
                            <option value="Xiaomi">Xiaomi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon Barang</label>
                        <input type="text" class="form-control" name="diskon" value="<?php echo $data['diskon'];?>"
                            placeholder="Masukan DIskon Barang">
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </form>
            </div>
        </div>
    </div>
</body>


<!-- Modal -->
<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="image/<?php echo $data['image']; ?>" style="width: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>

<?php
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

        mysqli_query($koneksi, "UPDATE tb_barang SET
            nama_barang='$nama_barang', harga_beli='$harga_beli', stok='$stok', image='$image', jenis='$jenis', diskon='$diskon'
            WHERE id_barang='$id'
        ") or die(mysqli_error($koneksi));

        echo "<div align ='center'><h5>Silahkan Tunggu, Data Sedang Disimpan...</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/asset/data_barang.php'>";
    }
?>