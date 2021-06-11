<?php
require_once '../../controllers/select_data.php';

if (isset($_SESSION['log_uname'])) {
    $id_num = $_SESSION['log_uname'];
    $result = data_view("SELECT * FROM akun WHERE username = ?", $id_num);
    // var_dump($result);
    $id_akn = $result["id_akun"];
    $usr_res = data_view("SELECT * FROM pengguna WHERE id_akun = ?", $id_akn);
    // var_dump($usr_res);
    $_SESSION['id_no'] = $usr_res['id_user'];
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

    <title>Edit Profile</title>

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
                                <h4>Edit Profile</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="rumahSakit.php" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;
                <!--Form-->
                <form action="../../controllers/edit_data.php" method="POST">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="edit_profile"></input>
                    &nbsp;&nbsp;
            </nav>
        </div>
    </div>
    <!--Navbar-->
    <br><br><br><br>
    <div class="container" style="background-color: white; border-radius: 7px;">
        <?php
        // alert edit data
        if ($_SESSION['eff_edit'] > 0) {
            $_SESSION['eff_edit'] = -1;
        ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil mengubah data diri
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        } else if ($_SESSION['eff_edit'] == 0) {
            $_SESSION['eff_edit'] = -1;
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Gagal mengubah data diri!!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        }
        ?>
        <center>
            <img src="../../storages/gambar/logo2.png" width="500px">
        </center>
        <!--Grid-->
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <center>
                        <img src="../../storages/gambar/cwo.png" alt="">
                    </center>
                </div>
                <div class="col-sm">
                    <div class="mb-3">
                        <label for="username_regis" class="form-label">*Username</label>
                        <input type="text" class="form-control" name="username_regis" required id="username_regis" disabled aria-describedby="usernameHelp" placeholder="Tulis username anda disini" value="<?= $result['username'] ?>">
                    </div>
                    <!-- <div class="mb-3">
                            <label for="kata_sandi_reg" class="form-label">*Kata Sandi</label>
                            <input type="password" class="form-control" name="kata_sandi_reg" required
                                id="kata_sandi_reg" aria-describedby="passwordHelp" value="<?= $result['password'] ?>"
                                placeholder="Tulis kata sandi anda disini">
                        </div> -->
                    <div class="mb-3">
                        <label for="email_reg" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email_reg" id="email_reg" value="<?= $result['email'] ?>" aria-describedby="emailHelp" placeholder="Tulis email anda disini" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="nama" class="form-control" id="nama" name="nama" aria-describedby="namaHelp" placeholder="Tulis nama lengkap anda disini" value="<?= $usr_res['nama_lengkap'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <input type="jeniskelamin" class="form-control" id="jeniskelamin" name="jeniskelamin" value="<?= $usr_res['jenis_kelamin'] ?>" aria-describedby="jeniskelaminHelp" placeholder="Tulis jenis kelamin anda disini">
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birthday" id="birthday" value="<?= $usr_res['tanggal_lahir'] ?>" aria-describedby="birthdayHelp" placeholder="Tulis tanggal lahir anda disini">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="alamat" class="form-control" id="alamat" name="alamat" value="<?= $usr_res['alamat'] ?>" aria-describedby="alamatHelp" placeholder="Tulis alamat lahir anda disini">
                    </div>
                    <div class="mb-3">
                        <label for="ktp" class="form-label">No. KTP</label>
                        <input type="ktp" class="form-control" id="ktp" name="ktp" aria-describedby="ktpHelp" placeholder="Tulis nomor KTP anda disini" value="<?= $usr_res['no_ktp'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">No. Telepon</label>
                        <input type="telepon" class="form-control" id="telepon" name="telepon" value="<?= $usr_res['no_telepon'] ?>" aria-describedby="teleponHelp" placeholder="Tulis nomor telepon anda disini">
                    </div>

                    </form>
                    <!--Form-->
                </div>
                <div class="col-sm">
                    <center>
                        <img src="../../storages/gambar/cwe.png" alt="">
                    </center>
                </div>
            </div>
        </div>
        <!--Grid-->
        <br><br><br>
    </div>
    <br><br>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>