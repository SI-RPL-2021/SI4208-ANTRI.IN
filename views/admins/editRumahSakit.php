<?php
require_once '../../controllers/select_data.php';

if (isset($_GET['id_rs'])) {
    $id_num = $_GET['id_rs'];
    $result = view_data("SELECT * FROM rumah_sakit WHERE id_rs=$id_num")[0];
    $_SESSION['id_no'] = $id_num;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Admin | Edit Data Rumah Sakit</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">
</head>

<body style="background-color: rgb(181, 240, 181);">
    <!--Navbar-->
    <div class="d-flex justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="../../storages/gambar/logo.png" width="60" alt="ANTRI.IN">
                </a>
                <div class="collapse navbar-collapse nav justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="">
                                <h4>Edit Data Rumah Sakit</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="adminRumahSakit.php" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;
                <!--Form-->
                <form action="../../controllers/edit_data.php" method="POST">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="edit_hospital"></input>
                    &nbsp;&nbsp;
        </nav>
    </div>
    </div>

    <!--content-->
    <br><br><br><br>
    <div class="container" style="background-color: white; border-radius: 7px;">
        <center>
            <img src="../../storages/gambar/logo2.png" width="500px">
        </center>
        <!--Grid-->
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <center>
                        <img src="../../storages/gambar/rs.png" width="250">
                    </center>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="exampleInputNama" class="form-label">Nama Rumah Sakit</label>
                        <input type="nama" class="form-control" id="exampleInputNama" aria-describedby="namaHelp" name="namaRs" value="<?= $result['nama_rs'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAlamat" class="form-label">Alamat</label>
                        <input type="alamat" class="form-control" id="exampleInputAlamat" aria-describedby="alamatHelp" name="alamatRs" value="<?= $result['alamat_rs'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTelp" class="form-label">No Telepon</label>
                        <input type="telp" class="form-control" id="exampleInputTelp" aria-describedby="telpHelp" name="telpRs" value="<?= $result['no_telepon_rs'] ?>">
                    </div>

                    </form>
                    <!--Form-->
                </div>
                <div class="col-sm">

                </div>
            </div>
        </div>
        <!--Grid-->
        <br><br><br>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>