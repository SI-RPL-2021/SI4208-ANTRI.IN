<?php require_once '../../controllers/select_data.php';
$id_rsv = $_GET['id_dok_rsv'];
$rsv_res = view_data("SELECT * FROM list_dokter WHERE id_dokter = '$id_rsv'")[0];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Reservasi Rumah Sakit</title>

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
                <!--Form-->
                <form action="../../controllers/edit_data.php" method="POST">
                    <input type="submit" class="btn btn-primary" value="Reservasi" name="edit_apotek"></input>
                    <!-- <input type="hidden" name="id_apk_hid" value="<?= $result['id_'] ?>"></input> -->
                    &nbsp;&nbsp;
            </nav>
        </div>
    </div>

    <!--Container body-->
    <br><br><br><br><br>
    <div class="container" style="background-color: white; border-radius: 5%;">
        <br>
        <!--Grid-->
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <center>
                        <img src="../../storages/gambar/cwe.png" style="width: 250px;">
                    </center>
                </div>
                <!--container-->
                <div class="col-sm" style="background-color: rgb(143, 219, 143); border-radius: 15px;">
                    <br><br>
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
                    <div class="container" style="background-color: rgb(4, 71, 4);">
                        <h6>
                            <center>
                                <font color=white><b>P A S I E N</b></font>
                            </center>
                        </h6>
                    </div>
                    <br>
                    <div class="mb-3 row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10" style="border-radius: 12px;">
                            <input type="nama" class="form-control" id="inputnama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputusia" class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10" style="border-radius: 12px;">
                            <input type="usia" class="form-control" id="inputusia">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputalamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10" style="border-radius: 12px;">
                            <input type="alamat" class="form-control" id="inputalamat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputnohp" class="col-sm-2 col-form-label">No.Hp</label>
                        <div class="col-sm-10" style="border-radius: 12px;">
                            <input type="nohp" class="form-control" id="inputnohp">
                        </div>
                    </div>
                    </form>
                </div>

                <!--akhir container-->
                <div class="col-sm">
                    <center>
                        <img src="../../storages/gambar/cwo.png" style="width: 250px;">
                    </center>
                </div>

                <div class="container px-5 mx-5">
                    <div class="row pt-4 text-center">
                        <input type="number" class="form-control" id="inputlinenumber" value="<?= $_COOKIE['line_number'] ?>">
                    </div>
                </div>

            </div>
        </div>
        <!--akhir grid-->
        <br>
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