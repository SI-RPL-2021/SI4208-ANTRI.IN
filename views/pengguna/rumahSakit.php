<?php require_once '../../controllers/select_data.php';
$result = view_data("SELECT * FROM rumah_sakit");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Daftar Rumah Sakit</title>

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
                        <a class="nav-link disabled" href="#">Apotek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cari Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Rumah Sakit</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?= $_SESSION['log_uname'] ?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="editProfile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
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
    <div class="container pt-2 mt-2" style="background-color: white; border-radius: 20px;">
        <br>
        <h1>Temukan Rumah Sakit yang Tepat</h1>
        <h7>Cari dan temukan rumah sakit yang tepat untuk kebutuhan medis</h7>
        <h7>Anda, dan reservasi dengan mudah</h7>
        <br><br>
        <br>

        <!-- <div class="container">
            <form action="">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <input type="email" class="form-control" id="Cari1" aria-describedby="emailHelp"
                                placeholder="Lokasi">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="email" class="form-control" id="Cari2" aria-describedby="emailHelp"
                                placeholder="Nama rumah sakit">
                        </div>
                    </div>
                </div>
            </form>
            <button type="cari" class="btn btn-primary">Cari</button>
            <br><br>
        </div> -->
    </div>

    <div class="container pt-2 mt-2" style="background-color: white; border-radius: 6px;">
        <br>
        <h2>Telusuri Berdasarkan Rumah Sakit</h2>
        <br>
        <div class="container text-center justify-content-center">
            <div class="row">
                <?php
                foreach ($result as $rs) {
                ?>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="rs.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $rs['nama_rs'] ?></h5>
                                <p class="card-text">Rumah Sakit ini merupakan salah satu layanan kesehatan untuk masyarakat
                                    sekitar <?= $rs['alamat_rs'] ?>. Masyarakat pun bisa melakukan berobat rutin dan rawat inap di rumah
                                    sakit ini. Memiliki beberapa poliklinik dan dokter spesialis.</p>
                                <a href="#" class="btn btn-success">Detail</a>
                            </div>
                        </div>
                    </div><?php
                        }
                            ?>
            </div>
        </div>
        <br><br>
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