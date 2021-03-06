<?php require_once '../../controllers/select_data.php';
$id_usr_rsvp = $_SESSION['log_uname'];
$usr_rsvp = data_view("SELECT * FROM akun WHERE username = ?", $id_usr_rsvp);
$id_akun_rsvp = $usr_rsvp['id_akun'];
$usr_rsvp = data_view("SELECT * FROM pengguna WHERE id_akun = ?", $id_akun_rsvp);
$id_rsvp = $usr_rsvp['id_user'];
$result = data_views("SELECT * FROM reservasi WHERE id_user = ?", $id_rsvp);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>List Reservasi</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
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
                                <h4>Histori Reservasi Anda</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="rumahSakit.php" type="button" class="btn btn-danger">Home</a>
                &nbsp;&nbsp;
        </nav>
    </div>
    </div>

    <!--Container body-->
    <br><br><br><br><br>
    <div class="container pt-2 mt-2" style="background-color: white;">
        <!-- <br><a href="" style="text-decoration:none; color:black;">
            <h1>HISTORI RESERVASI ANDA</h1>
        </a> -->

        <?php
        // alert edit data
        if ($_SESSION['eff_add'] > 0 or $_SESSION['eff_edit'] > 0 or $_SESSION['eff_del_one'] > 0) {
            $_SESSION['eff_add'] = -1;
            $_SESSION['eff_del_one'] = -1;
            $_SESSION['eff_edit'] = -1;
        ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil mengubah data reservasi
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        } else if ($_SESSION['eff_add'] == 0) {
            $_SESSION['eff_add'] = -1;
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Gagal mengubah data reservasi!!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        }
        ?>

        <div class="card text-dark bg-light my-5" style="max-width: 100%;">
            <div class="card-header">
                <!-- <div class="row justify-content-between ml-2 mr-2">.
                    <a class="btn btn-success" href="tambahDokter.html">
                        Tambahkan dokter baru
                    </a>
                </div> -->
            </div>
            <div class="card-body">
                <table id="table_rsvp" class="table table-hover table-striped table-bordered table-light" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Kode Reservasi</th>
                            <th scope="col">Nomor Antrian</th>
                            <th scope="col">Status</th>
                            <th scope="col">Dokter</th>
                            <th scope="col">Rumah Sakit</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $item) {
                            $id_dok = $item['id_dokter'];
                            $id_rs = $item['id_rs'];
                            $dok_rsvp = data_view("SELECT * FROM list_dokter WHERE id_dokter = ?", $id_dok);
                            $rs_rsvp = data_view("SELECT * FROM rumah_sakit WHERE id_rs = ?", $id_rs);
                        ?>
                            <tr>
                                <td><?php echo $item['id_reservasi'] ?></td>
                                <td><?php echo $item['nomor_antrian'] ?></td>
                                <td><?php echo $item['status_reserv'] ?></td>
                                <td><?php echo $dok_rsvp['nama_dokter'] ?></td>
                                <td><?php echo $rs_rsvp['nama_rs'] ?></td>
                                <td>
                                    <?php
                                    if ($item['status_reserv'] == 'ambil obat') {
                                    ?>
                                        <a href="terusanResepObat.php?id_usr=<?= $item['id_user'] ?>" type="button" class="btn btn-info">Obat >></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_rsvp').DataTable();
        });
    </script>
</body>

</html>