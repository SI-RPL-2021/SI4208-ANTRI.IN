<?php
require '../../controllers/select_data.php';
$rp_obat = view_data("SELECT * FROM resep_obat");
$rk_medis = view_data("SELECT * FROM rekam_medis");
$pggn = view_data("SELECT * FROM pengguna");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Admin | Tambahkan Data Apotek</title>

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
                                <h4>Tambahkan Data Apotek</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="adminApotek.php" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;
                <!--Form-->
                <form action="../../controllers/add_data.php" method="POST">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="add_apotek"></input>
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
                        <img src="../../storages/gambar/apotek.jpg" width="325">
                    </center>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="exampleInputNama" class="form-label">Nama Apotek</label>
                        <input type="nama" class="form-control" id="exampleInputNama" name="namaApotek" aria-describedby="namaHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAlamat" class="form-label">Alamat</label>
                        <input type="alamat" class="form-control" id="exampleInputAlamat" name="alamatApotek" aria-describedby="alamatHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTelp" class="form-label">No Telepon</label>
                        <input type="telp" class="form-control" id="exampleInputTelp" name="telpApotek" aria-describedby="telpHelp">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="exampleInputPasien" class="form-label">Nama Pasien</label>
                            <input type="pasien" class="form-control" id="exampleInputPasien" name="pasienApotek"
                                aria-describedby="pasienHelp"> -->
                        <label for="catsp" class="form-label">Pasien - Obat</label>
                        <select name="medName" id="catsp" class="form-control">
                            <?php
                            foreach ($rp_obat as $obt) {
                                $id_rkm = $obt['id_rekam_medis'];
                                $rkm = data_view("SELECT * FROM rekam_medis WHERE `id_rekam_medis` = ?", $id_rkm);
                                $id_usr = $rkm['id_user'];
                                $pgn = data_view("SELECT * FROM pengguna WHERE `id_user` = ?", $id_usr);
                            ?>
                                <option value="<?= $obt['id_resep_obat'] ?>"><?= $pgn['nama_lengkap'] ?> - <?= $obt['daftar_obat'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
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


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>