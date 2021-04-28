<?php
require_once '../../controllers/select_data.php';

if (isset($_GET['id_rs'])) {
    $id_num = $_GET['id_rs'];
    $result = view_data("SELECT * FROM poliklinik WHERE id_rs=$id_num");
    $rs_res = view_data("SELECT * FROM rumah_sakit WHERE id_rs=$id_num")[0];
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

    <title>Admin | Data Poliklinik</title>
</head>

<body style="background-color: rgb(181, 240, 181);">
    <!--Navbar-->
    <div class="container">
        <div class="d-flex justify-content-between">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                &nbsp;&nbsp;&nbsp;
                <a class="navbar-brand" href="">
                    <img src="../../storages/gambar/logo.png" width="60" alt="ANTRI.IN">
                </a>
                <div class="collapse navbar-collapse nav justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="">
                                <h4>Data Poliklinik RS. <?= $rs_res['nama_rs'] ?></h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="adminRumahSakit.php" type="button" class="btn btn-danger">Cancel</a>
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
        <br>
        <?php
        // alert edit data
        if ($_SESSION['eff_add'] > 0 or $_SESSION['eff_edit'] > 0 or $_SESSION['eff_del_one'] > 0) {
            $_SESSION['eff_add'] = -1;
            $_SESSION['eff_del_one'] = -1;
            $_SESSION['eff_edit'] = -1;
        ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil mengubah data poliklinik
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        } else if ($_SESSION['eff_add'] == 0) {
            $_SESSION['eff_add'] = -1;
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Gagal mengubah data poliklinik!!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        }
        ?>

        <div class="card text-dark bg-light my-5" style="max-width: 100%;">
            <div class="card-header">
                <div class="row justify-content-between ml-2 mr-2">.
                    <a class="btn btn-success" href="tambahPoliklinik.html">
                        Tambahkan poliklinik
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="table_dr" class="table table-hover table-striped table-bordered table-light" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama Poliklinik</th>
                            <th scope="col">Dokter</th>
                            <th scope="col">Jadwal Praktek</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no_dr = 1;
                        foreach ($result as $item) {
                            $id_dok = $item["id_dokter"];
                            $dr_res = view_data("SELECT * FROM list_dokter WHERE id_dokter=$id_dok")[0];
                        ?>
                            <tr>
                                <td><?php echo $no_dr ?></td>
                                <td><?php echo $item['nama_poli'] ?></td>
                                <td><?php echo $dr_res['nama_dokter'] ?></td>
                                <td><?php echo $item['jadwal_buka'] ?></td>
                                <td><?php echo $item['no_telepon'] ?></td>
                                <td>
                                    <a href="editPoliklinik.php?id_poli=<?= $item['id_poli'] ?>" type="button" class="btn btn-primary">Edit</a>
                                    <a href="../../controllers/del_data.php?delpl=<?= $item['id_poli'] ?>" class="btn btn-danger align-items-center justify-content-center" role="button">Hapus</a>
                                </td>
                            </tr>
                        <?php $no_dr += 1;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>