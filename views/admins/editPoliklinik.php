<?php
require_once '../../controllers/select_data.php';
$dr_res = view_data("SELECT * FROM list_dokter");

if (isset($_GET['id_poli'])) {
    $id_num = $_GET['id_poli'];
    $result = view_data("SELECT * FROM poliklinik WHERE id_poli=$id_num")[0];
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

    <title>Admin | Edit Data Poliklinik</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">
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
                                    <h4>Edit Data Poliklinik</h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a href="adminPoliklinik.php?id_rs=<?= $result['id_rs'] ?>" type="button" class="btn btn-danger">Cancel</a>
                    &nbsp;&nbsp;
                    <!--Form-->
                    <form action="../../controllers/edit_data.php" method="POST">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="edit_poli"></input>
                        <input type="hidden" name="id_rs_hid" value="<?= $result['id_rs'] ?>"></input>
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
                        <input type="nama" class="form-control" id="exampleInputNama" aria-describedby="namaHelp" name="namaPoli" value="<?= $result['nama_poli']?>">
                    </div>
                    <div class="mb-3">
                        <label for="cats" class="form-label">Dokter</label>
                        <select name="drName" id="cats" class="form-control">
                        <?php
                        foreach ($dr_res as $dr) {
                            if($dr['id_dokter'] == $result['id_dokter']){
                                $sltcd='selected';
                            }else{$sltcd='';}
                        ?>
                            <option value="<?= $dr['id_dokter'] ?>" <?= $sltcd ?> ><?= $dr['nama_dokter'] ?></option>
                            <!-- <input type="hidden" name="id_dokter_hid" value="<?= $dr['id_dokter'] ?>" class="form-control"></input> -->
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputJadwal" class="form-label">Jadwal Praktik</label>
                        <input type="jadwal" class="form-control" id="exampleInputJadwal" aria-describedby="jadwalHelp" name="jadwalPoli" value="<?= $result['jadwal_buka']?>">
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