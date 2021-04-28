<?php
require '../../controllers/select_data.php';
$dr_res = view_data("SELECT * FROM list_dokter");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Admin | Tambahkan Data Poliklinik</title>
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
                                <h4>Tambahkan Data Poliklinik</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="adminPoliklinik.php?id_rs=<?= $_GET['id_rs'] ?>" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;
                <!--Form-->
                <form action="../../controllers/add_data.php" method="POST">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="add_poli"></input>
                    <input type="hidden" name="id_rs_hid" value="<?= $_GET['id_rs'] ?>"></input>
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
                        <img src="../../storages/gambar/poli.png" width="220">
                    </center>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="exampleInputNama" class="form-label">Nama Poliklinik</label>
                        <input type="nama" class="form-control" id="exampleInputNama" aria-describedby="namaHelp" name="namaPoli">
                    </div>
                    <div class="mb-3">
                        <!-- <label for="exampleInputDokter" class="form-label">Dokter</label>
                        <input type="dokter" class="form-control" id="exampleInputDokter" name="" aria-describedby="dokterHelp"> -->
                        <label for="cats" class="form-label">Dokter</label>

                        <select name="drName" id="cats" class="form-control">
                        <?php
                        foreach ($dr_res as $dr) {
                        ?>
                            <!-- <div class="col-md-4">
                                <input class="form-check-input" type="radio" value="<?= $dr['id_dokter'] ?>" name="id_dok_chk" id="cats">
                                <?= $dr['nama_dokter'] ?>
                            </div> -->
                            <option value="<?= $dr['id_dokter'] ?>"><?= $dr['nama_dokter'] ?></option>
                            <!-- <input type="hidden" name="id_dokter_hid" value="<?= $dr['id_dokter'] ?>" class="form-control"></input> -->
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputJadwal" class="form-label">Jadwal Praktik</label>
                        <input type="jadwal" class="form-control" id="exampleInputJadwal" aria-describedby="jadwalHelp" name="jadwalPoli">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>