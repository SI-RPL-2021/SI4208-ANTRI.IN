<?php
require_once '../../controllers/select_data.php';

if (isset($_SESSION['log_uname'])) {
    $id_num = $_SESSION['log_uname'];
    $result = data_view("SELECT * FROM dokter_akun WHERE username = ?", $id_num);
    // var_dump($result);
    $id_akn = $result["id_akun_dok"];
    $usr_res = data_view("SELECT * FROM list_dokter WHERE id_akun_dok = ?", $id_akn);
    // var_dump($usr_res);
    $_SESSION['id_no'] = $usr_res['id_dokter'];
    $id_usr = $usr_res['id_dokter'];
    $rkm_medis = view_data("SELECT * FROM rekam_medis");
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

    <title>Rekam Medis Pasien</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
</head>

<body style="background-color: rgb(181, 240, 181);">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgb(143, 219, 143);">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="drChat.php">Chat Konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="drReservasi.php">Reservasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Rekam Medis Pasien</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, Dr. <?= $_SESSION['log_fname'] ?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="../../controllers/db_connnect.php?out_log=zft" onmouseover="this.style.color='red';" onmouseout="this.style.color='';">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-content-->
        <br><br><br>
        <div class="container text-center" style="background-color: white; border-radius: 7px;">
            <a class="" href="">
                <img src="../../storages/gambar/logo2.png" width="500px">
            </a>
            <br><br>Berikut adalah rekam medis dari seluruh pasien</b>!
            <br><br><br>
            <div class="container">
                <div class="card text-dark bg-light my-5" style="max-width: 100%;">
                    <div class="card-header">
                        <div class="row justify-content-between ml-2 mr-2">.
                            <!-- <a class="btn btn-success" href="mengisiRekamMedis.php">
                                Tambahkan Rekam Medis
                                <span class="sr-only">(current)</span>
                            </a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table_rkm_all" class="table table-hover table-striped table-bordered table-light" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Rumah Sakit</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Diagnosis</th>
                                    <!-- <th scope="col">Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no_dr = 1;
                                foreach ($rkm_medis as $item) {
                                    $id_rs = $item['id_rs'];
                                    $rmh_skt = data_view("SELECT * FROM rumah_sakit WHERE id_rs = ?", $id_rs);
                                    $id_pasien = $item['id_user'];
                                    $pasien = data_view("SELECT * FROM pengguna WHERE id_user = ?", $id_pasien);
                                ?>
                                    <tr>
                                        <td><?php echo $no_dr ?></td>
                                        <td><?php echo $pasien['nama_lengkap'] ?></td>
                                        <td><?php echo $rmh_skt['nama_rs'] ?></td>
                                        <td><?php echo $item['keluhan'] ?></td>
                                        <td><?php echo $item['diagnosis'] ?></td>
                                        <!-- <td>
                                            <a href="editDokter.php?id_dok=<?= $item['id_dokter'] ?>" type="button" class="btn btn-primary">Edit</a>
                                            <a href="../../controllers/del_data.php?delrkm=<?= $item['id_rekam_medis'] ?>" class="btn btn-danger align-items-center justify-content-center" role="button">Hapus</a>
                                        </td> -->
                                    </tr>
                                <?php $no_dr += 1;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <!-- Datatable -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#table_rkm_all').DataTable();
            });
        </script>
</body>

</html>