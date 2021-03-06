<?php
require_once '../../controllers/select_data.php';
$rp_obat = view_data("SELECT * FROM resep_obat");
$rk_medis = view_data("SELECT * FROM rekam_medis");
$pggn = view_data("SELECT * FROM pengguna");

if (isset($_GET['id_apk'])) {
    $id_num = $_GET['id_apk'];
    $result = data_view("SELECT * FROM apotek WHERE id_apotek = ?", $id_num);
    $_SESSION['id_no'] = $id_num;
}

$sltcd = '';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Admin | Edit Data Apotek</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">
</head>

<body style="background-color: rgb(181, 240, 181);">
    <!--Navbar-->

    <div class="d-flex justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="../../storages/gambar/logo.png" width="60" alt="">
                </a>
                <div class="collapse navbar-collapse nav justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="">
                                <h4>Edit Data Apotek</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="adminApotek.php" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;
                <!--Form-->
                <form action="../../controllers/edit_data.php" method="POST">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="edit_apotek"></input>
                    <input type="hidden" name="id_apk_hid" value="<?= $result['id_'] ?>"></input>
                    &nbsp;&nbsp;
        </nav>
    </div>
    </div>

    <!--Content-->
    <br><br><br><br>
    <div class="container" style="background-color: white; border-radius: 7px;">
        <center>
            <img src="logo2.png" width="500px">
        </center>
        <!--Grid-->
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <center>
                        <img src="apotek.jpg" width="325">
                    </center>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="exampleInputNama" class="form-label">Nama Apotek</label>
                        <input type="nama" class="form-control" id="exampleInputNama" name="namaApotek" aria-describedby="namaHelp" value="<?= $result['nama_apotek'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAlamat" class="form-label">Alamat</label>
                        <input type="alamat" class="form-control" id="exampleInputAlamat" name="alamatApotek" aria-describedby="alamatHelp" value="<?= $result['alamat_apotek'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTelp" class="form-label">No Telepon</label>
                        <input type="telp" class="form-control" id="exampleInputTelp" name="telpApotek" aria-describedby="telpHelp" value="<?= $result['no_telepon_apotek'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="catsp" class="form-label">Pasien - Obat</label>
                        <select name="medName" id="catsp" class="form-control">
                            <?php
                            foreach ($rp_obat as $obt) {
                                $id_rkm = $obt['id_rekam_medis'];
                                $rkm = data_view("SELECT * FROM rekam_medis WHERE `id_rekam_medis` = ?", $id_rkm);
                                $id_usr = $rkm['id_user'];
                                $pgn = data_view("SELECT * FROM pengguna WHERE `id_user` = ?", $id_usr);
                                if ($obt['id_resep_obat'] == $result['id_resep_obat']) {
                                    $sltcd = 'selected';
                                } else {
                                    $sltcd = '';
                                }
                            ?>
                                <option value="<?= $obt['id_resep_obat'] ?>" <?= $sltcd ?>><?= $pgn['nama_lengkap'] ?> - <?= $obt['daftar_obat'] ?></option>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>