<?php
require '../controllers/add_data.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>REGISTRASI | ANTRI-IN</title>

    <link rel="icon" href="../storages/gambar/logo.png" type="image/png" sizes="128x128">
</head>

<body style="background-color: rgb(181, 240, 181);">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgb(143, 219, 143);">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="../storages/gambar/logo.png" alt="ANTRI.IN" width="60">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#">Apotek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Cari Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Rumah Sakit</a>
                    </li> -->
                </ul>
                <ul class="navbar-nav d-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container pt-5 pb-3" style="border-radius: 20px;">
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-md" style="background-color: rgb(255, 255, 255); border-radius: 20px;">
                    <br>
                    <img src="../storages/gambar/logo2.png" alt="">
                    <form action="../controllers/add_data.php" method="POST">
                        <div class="mb-3">
                            <label for="username_regis" class="form-label">*Username</label>
                            <input type="text" class="form-control" name="username_regis" required id="username_regis" aria-describedby="usernameHelp" placeholder="Tulis username anda disini">
                        </div>
                        <div class="mb-3">
                            <label for="kata_sandi_reg" class="form-label">*Kata Sandi</label>
                            <input type="password" class="form-control" name="kata_sandi_reg" required id="kata_sandi_reg" aria-describedby="passwordHelp" placeholder="Tulis kata sandi anda disini">
                        </div>
                        <div class="mb-3">
                            <label for="email_reg" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_reg" id="email_reg" aria-describedby="emailHelp" placeholder="Tulis email anda disini">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="nama" class="form-control" id="nama" name="nama" aria-describedby="namaHelp" placeholder="Tulis nama lengkap anda disini">
                        </div>
                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                            <input type="jeniskelamin" class="form-control" id="jeniskelamin" name="jeniskelamin" aria-describedby="jeniskelaminHelp" placeholder="Tulis jenis kelamin anda disini">
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="birthday" id="birthday" aria-describedby="birthdayHelp" placeholder="Tulis tanggal lahir anda disini">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="alamat" class="form-control" id="alamat" name="alamat" aria-describedby="alamatHelp" placeholder="Tulis alamat lahir anda disini">
                        </div>
                        <div class="mb-3">
                            <label for="ktp" class="form-label">No. KTP</label>
                            <input type="ktp" class="form-control" id="ktp" name="ktp" aria-describedby="ktpHelp" placeholder="Tulis nomor KTP anda disini">
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">No. Telepon</label>
                            <input type="telepon" class="form-control" id="telepon" name="telepon" aria-describedby="teleponHelp" placeholder="Tulis nomor telepon anda disini">
                        </div>
                        <div class="row text-center mb-3">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Daftar" name="daftar_akun"></input>
                                <input type="reset" class="btn btn-secondary" value="Cancel"></input>
                                <div class="mt-3 text-center">
                                    Sudah punya akun? <a href="login.php">Login disini</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm">

                </div>
            </div>
        </div>

    </div>







    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>