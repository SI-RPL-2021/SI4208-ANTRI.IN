<?php require '../../controllers/select_data.php';
$result = view_data("SELECT * FROM pengguna");
$pasien = view_data("SELECT * FROM pengguna");
$dokter = view_data("SELECT * FROM list_dokter");
$apotek = view_data("SELECT * FROM apotek");
$rumah_sakit = view_data("SELECT * FROM rumah_sakit");

$_SESSION['eff_add'] = -1;
$_SESSION['eff_edit'] = -1;
$_SESSION['eff_del_one'] = -1;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Datatable -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    <title>Admin | Data Pengguna</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css">
</head>

<body style="background-color: rgb(181, 240, 181);">

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgb(143, 219, 143);">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminApotek.php">Apotek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminDokter.php">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminPengguna.php">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminRumahSakit.php">Rumah Sakit</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?= $_SESSION['log_uname'] ?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">///////\\\\\\\</a></li>
                            <li><a class="dropdown-item" href="#">\\\\\\\///////</a></li>
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
    <div class="container pt-5 pb-3" style="background-color: white;">
        <br><a href="" style="text-decoration:none; color:black;">
            <h1>PREVIEW</h1>
        </a>

        <?php
        // alert edit data
        if ($_SESSION['eff_add'] > 0 or $_SESSION['eff_edit'] > 0 or $_SESSION['eff_del_one'] > 0) {
            $_SESSION['eff_add'] = -1;
            $_SESSION['eff_del_one'] = -1;
            $_SESSION['eff_edit'] = -1;
        ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil mengubah data pengguna
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        } else if ($_SESSION['eff_add'] == 0) {
            $_SESSION['eff_add'] = -1;
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Gagal mengubah data pengguna!!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        }
        ?>
        <div class="row">
            <a class="col-md-3 pt-1" style="text-decoration: none" href="adminRumahSakit.php">
                <div class="card bg-secondary text-light" style="background: linear-gradient(to bottom,#1F1C2C, #928DAB);">
                    <div class="card-head text-right pr-4 pt-2">
                        <i class="fas fa-hands-helping fa-4x" style="color:#928DAB"></i>
                    </div>
                    <div class="card-head h4 pt-2" style="z-index : 2;
                position: absolute; margin-left:56px">Jumlah Rumah Sakit</div>
                    <div class="card-body h3 font-weight-bold py-3 text-center"><?= count($rumah_sakit) ?></div>
                </div>
            </a>
            <a class="col-md-3 pt-1" style="text-decoration: none" href="adminApotek.php">
                <div class="card text-light" style="background: linear-gradient(to bottom, #16222A, #3A6073);">
                    <div class="card-head text-right pr-4 pt-2">
                        <i class="fas fa-mail-bulk fa-4x" style="color:#3A6073"></i>
                    </div>
                    <div class="card-head h4 pt-2" style="z-index : 2;
                position: absolute; margin-left:42px">Jumlah Apotek</div>
                    <div class="card-body h3 font-weight-bold py-3 text-center"><?= count($apotek) ?></div>
                </div>
            </a>
            <a class="col-md-3 pt-1" style="text-decoration: none" href="adminDokter.php">
                <div class="card bg-secondary text-light" style="background: linear-gradient(to bottom, #3f4c6b,#A8CABA);">
                    <div class="card-head text-right pr-4 pt-2">
                        <i class="fas fa-user-friends fa-4x" style="color:#a8cabadb"></i>
                    </div>
                    <div class="card-head h4 pt-2" style="z-index : 2;
                position: absolute; margin-left:84px">Jumlah Dokter</div>
                    <div class="card-body h3 font-weight-bold py-3 text-center"><?= count($dokter) ?></div>
                </div>
            </a>

            <a class="col-md-3 pt-1" style="text-decoration: none" href="adminPengguna.php">
                <div class="card bg-secondary text-light" style="background: linear-gradient(to bottom, #232526, #414345);">
                    <div class="card-head text-right pr-4 pt-2">
                        <i class="fas fa-coins fa-4x" style="color:#4c4e51"></i>
                    </div>
                    <div class="card-head h4 pt-2" style="z-index : 2;
                position: absolute; margin-left:84px">Jumlah Pasien</div>
                    <div class="card-body h3 font-weight-bold py-3 text-center"><?= count($pasien) ?></div>
                </div>
            </a>

            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <!-- <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                    .
                </p>
            </figure> -->
            <div class="card bg-secondary text-light px-2 py-2" style="background: linear-gradient(to right, #c9d6ff, #e2e2e2);">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        .
                    </p>
                </figure>
            </div>

            <div class="card bg-secondary text-light px-2 py-2" style="background: linear-gradient(to right, #c9d6ff, #e2e2e2);">
                <figure class="highcharts-figure2">
                    <div id="container2"></div>
                    <p class="highcharts-description2">
                        .
                    </p>
                </figure>
            </div>

        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/v4-shims.js"></script>

    <!-- Datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_usr').DataTable();
        });
    </script>

    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

    <script>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Komparasi Rumah Sakit vs Apotek'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Rumah Sakit',
                    y: <?= count($rumah_sakit) ?>,
                    selected: true,
                    sliced: true
                }, {
                    name: 'Apotek',
                    y: <?= count($apotek) ?>
                }]
            }]
        });

        Highcharts.chart('container2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Komparasi Dokter vs Pasien'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Dokter',
                    y: <?= count($dokter) ?>,
                    selected: true,
                    sliced: true
                }, {
                    name: 'Pasien',
                    y: <?= count($pasien) ?>
                }]
            }]
        });
    </script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>