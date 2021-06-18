<?php
require_once '../../controllers/select_data.php';

if (isset($_SESSION['log_uname'])) {
    $id_num = $_SESSION['log_uname'];
    $result = data_view("SELECT * FROM akun WHERE username = ?", $id_num);
    // var_dump($result);
    $id_akn = $result["id_akun"];
    $usr_res = data_view("SELECT * FROM pengguna WHERE id_akun = ?", $id_akn);
    // var_dump($usr_res);
    $_SESSION['id_no'] = $usr_res['id_user'];
    $id_usr = $usr_res['id_user'];
    $rsvp = data_views("SELECT * FROM reservasi WHERE id_user = ?", $id_usr);
    $rmh_skt = view_data("SELECT * FROM rumah_sakit");
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

    <title>Rekam Medis</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">
</head>

<body style="background-color: rgb(181, 240, 181);">
    <!--Navbar-->
    <div class="d-flex justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                &nbsp;&nbsp;&nbsp;
                <a class="navbar-brand" href="">
                    <img src="../../storages/gambar/logo.png" width="60" alt="ANTRI.IN">
                </a>
                <div class="collapse navbar-collapse nav justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="">
                                <h4>Catat Rekam Medis</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="melihatRekamMedis.php" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;
                <!-- Form-->
                <form action="../../controllers/add_data.php" method="POST">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="add_rekam"></input>
                    &nbsp;&nbsp;
        </nav>
    </div>

    <!--Navbar-->
    <br><br><br><br>
    <div class="container text-center" style="background-color: white; border-radius: 7px;">
        <!-- <img src="../../storages/gambar/logo2.png" width="500px"> -->
        <br><br><b>Silahkan isi data rekam medis anda di bawah ini!</b>
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                    <div class="row mb-3">
                        <label for="cats" class="form-label">Rumah Sakit</label>

                        <select name="rs_id_rkm" id="cats" class="form-control">
                            <?php
                            foreach ($rmh_skt as $rs) {
                            ?>
                                <?= $rs['nama_rs'] ?>
                                <option value="<?= $rs['id_rs'] ?>"><?= $rs['nama_rs'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="rsvv" class="form-label">Reservasi</label>
                        <input type="text" class="form-control" id="rsvv" value=<?= end($rsvp)['nomor_antrian'] ?> disabled>
                        <input type="hidden" class="form-control" id="rsvv2" name='rsvp_id_rkm' value=<?= end($rsvp)['id_reservasi'] ?>>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Keluhan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keluh_patient"></textarea>
                    </div>
                    <div class="row mb-3">
                        <label for="dgnss" class="form-label">Diagnosis</label>
                        <input type="text" class="form-control" id="dgnss" name="diagnose_dr">
                    </div>
                    <br><br>
                </div>
                <div class="col">

                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>