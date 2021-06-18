<?php require_once '../../controllers/select_data.php';
$result = view_data("SELECT DISTINCT spesialis FROM list_dokter");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Daftar Dokter</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">
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
                        <a class="nav-link" href="resepObat.php">Obat Anda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Cari Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rumahSakit.php">Rumah Sakit</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?= $_SESSION['log_fname'] ?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="editProfile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="melihatRekamMedis.php">Rekam Medis</a></li>
                            <li><a class="dropdown-item" href="historiReservasi.php">Reservasi Anda</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="../../controllers/db_connnect.php?out_log=zft" onmouseover="this.style.color='red';" onmouseout="this.style.color='';">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Container body-->
    <br><br><br>
    <div class="container pt-2 mt-2 text-center" style="background-color: white; border-radius: 10px;">
        <br>
        <h1>Temukan dokter yang tepat</h1>
        <br>
        <h6>cari dan temukan dokter yang tepat untuk kebutuhan medis Anda. </h6>
        <h6>dan buat janji dengan mudah.</h6>
        <br>
    </div>

    <div class="container pt-2 mt-2" style="background-color: white; border-radius: 6px;">
        <br>
        <table class="table">
            <h2>Telusuri Berdasarkan Spesialisasi</h2>
            <br>

            <div class="container overflow-hidden">
                <div class="row gy-5">
                    <?php
                    foreach ($result as $drl) {
                    ?>
                        <div class="col-6">
                            <div class="p-3 border bg-light">
                                <h5 class="card-title">Dokter <?= $drl['spesialis'] ?></h5>
                                <p>Dokter <?= $drl['spesialis'] ?> adalah dokter yang menangani .....</p><br>
                                <p>List Dokter : Jam Praktek</p>
                                <ul>
                                    <?php
                                    $spe = $drl['spesialis'];
                                    $res_spe = data_views("SELECT * FROM list_dokter WHERE spesialis like ?", $spe, 's');
                                    foreach ($res_spe as $sp_dr) {
                                        $dr_id = $sp_dr['id_dokter'];
                                        $pra_jk = data_view("SELECT * FROM poliklinik WHERE id_dokter = ?", $dr_id);
                                    ?>
                                        <!-- <div class="px-3 row"> -->
                                        <li><a href="reservasi.php?id_dok_rsv=<?= $dr_id ?>"><?= $sp_dr['nama_dokter'] ?></a> (<?= $pra_jk['jadwal_buka'] ?>)</li>
                                        <!-- </div> -->
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>


            <br>
            <br>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>