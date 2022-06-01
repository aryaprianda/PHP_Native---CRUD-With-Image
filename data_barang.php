<!--
  MUHAMMAD ARYA PRIANDA
  18710068
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/datatables.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/datatables.js"></script>
    <title>Data Customer</title>
</head>

<body>
    <div class="container col-md-10 mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Tabel Data Customer
            </div>
            <div class="card-body">
                <a href="tambah_barang.php" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="display table table-bordered table-sm table-hover" style="width:100%" id="example">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Jenis</th>
                            <th class="text-center">Diskon</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>


                        <?php
                        include "koneksi.php";
                        $no = 1;

                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_barang");
                        while($data = mysqli_fetch_array($tampil)){

                    ?>
                        <tr>
                            <td class="text-center">
                                <?php echo$no++?>
                            </td>
                            <td>
                                <?php echo$data['nama_barang'];?>
                            </td>
                            <td>
                                <?php echo$data['harga_beli'];?>
                            </td>
                            <td class="text-center">
                                <?php echo$data['stok'];?>
                            </td>
                            <td class="text-center">
                                <img src="image/<?php echo $data['image']; ?>" style="width: 100px;">
                            </td>
                            <td class="text-center">
                                <?php echo $data['jenis'];?>
                            </td>
                            <td class="text-center">
                                <?php echo $data['diskon'];?>
                            </td>
                            <td class="text-center">
                                <a href="edit_barang.php?id_barang=<?php echo $data['id_barang']; ?>"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id_barang=<?php echo $data['id_barang']; ?>"
                                    class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
</body>

</html>