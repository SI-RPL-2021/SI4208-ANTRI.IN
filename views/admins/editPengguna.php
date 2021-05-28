<?php
require_once '../../controllers/select_data.php';

if (isset($_GET['id_usr'])) {
    $id_num = $_GET['id_usr'];
    $result = view_data("SELECT * FROM pengguna WHERE id_user=$id_num")[0];
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

    <title>Admin | Edit Data Pengguna</title>

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
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="">
                                <h4>Edit Data Pengguna</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="adminPengguna.php" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;
                <!--Form-->
                <form action="../../controllers/edit_data.php" method="POST">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="edit_pengguna"></input>
                    &nbsp;&nbsp;
        </nav>
    </div>
    </div>
    <!--Navbar-->
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
                        <img src="../../storages/gambar/user.png" alt="">
                    </center>
                </div>
                <div class="col-sm">

                    <div class="mb-3">
                        <label for="exampleInputNama" class="form-label">Nama</label>
                        <input type="nama" class="form-control" id="exampleInputNama" aria-describedby="namaHelp" value="<?= $result['nama_lengkap'] ?>" name="namaUsr"></input>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAlamat" class="form-label">Alamat</label>
                        <input type="alamat" class="form-control" id="exampleInputAlamat" aria-describedby="alamatHelp" name="alamatUsr" value="<?= $result['alamat'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputNohp" class="form-label">No Telepon</label>
                        <input type="nohp" class="form-control" id="exampleInputNohp" aria-describedby="nohpHelp" name="nohpUsr" value="<?= $result['no_telepon'] ?>">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>