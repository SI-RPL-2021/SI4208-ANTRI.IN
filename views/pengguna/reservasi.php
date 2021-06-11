<?php require_once '../../controllers/select_data.php';
$id_rsv = $_GET['id_dok_rsv'];
$usr_rsv = $_SESSION['log_uname'];
$rsv_res = data_view("SELECT * FROM list_dokter WHERE id_dokter = ?", $id_rsv);
$rsv_usr = data_view("SELECT * FROM akun WHERE username = ?", $usr_rsv);
$id_akun_rsv = $rsv_usr['id_akun'];
$rsv_usr = data_view("SELECT * FROM pengguna WHERE id_akun = ?", $id_akun_rsv);

$poli_rsv = data_view("SELECT * FROM poliklinik WHERE id_dokter = ?", $id_rsv);
$rs_poli = $poli_rsv['id_rs'];

$hsp_rsv = data_view("SELECT * FROM rumah_sakit WHERE id_rs = ?", $rs_poli);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Reservasi Online</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">
</head>

<body style="background-color: rgb(181, 240, 181);">

    <!--Navbar-->
    <div class="container">
        <div class="d-flex justify-content-between">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                &nbsp;&nbsp;&nbsp;
                <a class="navbar-brand" href="">
                    <img src="../../storages/gambar/logo.png" width="60" alt="">
                </a>
                <div class="collapse navbar-collapse nav justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="">
                                <h4>Reservasi Dokter</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="dokterList.php" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;

            </nav>
        </div>
    </div>

    <!--Container body-->
    <br><br><br><br>
    <div class="container" style="background-color: white; border-radius: 5%;">
        <!--Grid-->
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm text-center">
                    <img src="../../storages/gambar/cwe.png" style="width: 250px;">
                </div>
                <!--container-->
                <div class="col-sm" style="background-color: rgb(143, 219, 143); border-radius: 15px;">
                    <br>
                    <table style="margin-left: 10px;">
                        <tr>
                            <td>Dokter</td>
                            <td>&nbsp;&nbsp;&nbsp; : </td>
                            <td>&nbsp;&nbsp;&nbsp;Dr. <?= $rsv_res['nama_dokter'] ?></td>
                        </tr>
                        <tr>
                            <td>Spesialis</td>
                            <td>&nbsp;&nbsp;&nbsp; : </td>
                            <td>&nbsp;&nbsp;&nbsp;<?= $rsv_res['spesialis'] ?></td>
                        </tr>
                        <tr>
                            <td>No.Hp</td>
                            <td>&nbsp;&nbsp;&nbsp; : </td>
                            <td>&nbsp;&nbsp;&nbsp;<?= $rsv_res['no_telepon'] ?></td>
                        </tr>
                    </table>
                    <br>
                    <div class="container text-center" style="background-color: rgb(4, 71, 4); color:white;">
                        <h6>
                            <b>P A S I E N</b>
                        </h6>
                    </div>
                    <br>
                    <div class="mb-2 row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10" style="border-radius: 12px;">
                            <input type="nama" class="form-control" id="inputnama" value="<?= $rsv_usr['nama_lengkap'] ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <?php
                        $bday = new Datetime($rsv_usr['tanggal_lahir']); // Your date of birth
                        $today = new Datetime();
                        $diff = $today->diff($bday);

                        $addkkk = $_COOKIE['line_number'] + 1;
                        $_SESSION['usr_id_rsvp'] = $rsv_usr['id_user'];
                        $_SESSION['dok_id_rsvp'] = $id_rsv;
                        $_SESSION['rs_id_rsvp'] = $hsp_rsv['id_rs'];
                        // $dateOfBirth = $rsv_usr['tanggal_lahir'];
                        // $today = date("Y-m-d");
                        // $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        ?>
                        <label for="inputusia" class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10" style="border-radius: 12px;">
                            <input type="usia" class="form-control" id="inputusia" value="<?= $diff->y ?> tahun" disabled>
                            <!-- <input type="usia" class="form-control" id="inputusia" value="<?= $addkkk ?> tahun" disabled> -->
                            <!-- <input type="usia" class="form-control" id="inputusia" value="<?= $diff->format('%y') ?> tahun" disabled> -->
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputalamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10" style="border-radius: 12px;">
                            <input type="alamat" class="form-control" id="inputalamat" value="<?= $rsv_usr['alamat'] ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputnohp" class="col-sm-2 col-form-label">No.Hp</label>
                        <div class="col-sm-10" style="border-radius: 12px;">
                            <input type="nohp" class="form-control" id="inputnohp" value="<?= $rsv_usr['no_telepon'] ?>" disabled>
                        </div>
                    </div>

                    <!--Form-->
                    <div class="mb-3 row text-center pt-1">
                        <form action="../../controllers/select_data.php" method="POST">
                            <input type="submit" class="btn btn-warning" value="Buat Reservasi" name="get_antrian" style="width:390px; background-color:pink; border-color:pink;"></input>
                            <!-- <input type="hidden" name="id_apk_hid" value="<?= $result['id_'] ?>"></input> -->
                            &nbsp;&nbsp;
                        </form>
                    </div>
                </div>

                <!--akhir container-->
                <div class="col-sm text-center">
                    <img src="../../storages/gambar/cwo.png" style="width: 250px;">
                </div>

                <div class="container mr-5 text-center">
                    <div class="row pt-4">
                        <input type="string" class="btn btn-info" id="inputlinenumber" value="No. Antrian -->
                        <?= $_SESSION['line_number'] ?>" disabled style="font-size:80px;">
                    </div>
                </div>

            </div>
        </div>
        <!--akhir grid-->
        <br>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>