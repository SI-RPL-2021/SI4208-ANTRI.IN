<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <title>ANTRI.IN</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="icon" href="../storages/gambar/logo.png" type="image/png" sizes="128x128">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: rgb(181, 240, 181);">
    <!-- PHP Section -->
    <?php
    // __DIR__.$_SERVER['DOCUMENT_ROOT'].dirname(__FILE__)
    require '../controllers/select_data.php';
    if (!empty($_COOKIE['log_rem_me'])) {
        $username = $_COOKIE['log_uname_user'];
        $sandi = $_COOKIE['log_pass_user'];
        $rem_me = $_COOKIE['log_rem_me'];
    } else {
        $username = null;
        $sandi = null;
        $rem_me = null;
    }
    ?>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgb(143, 219, 143);">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="../storages/gambar/logo.png" width="60" alt="ANTRI.IN">
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
                        <a class="nav-link active" aria-current="page" href="">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container pt-4 px-5 mt-4 text-center">
        <div class="row pt-5 px-5">
            <br>
        </div>

        <?php
        // alert login
        if (!empty($_SESSION['eff_add'])) {
            if ($_SESSION['eff_add'] > 0) {
                $_SESSION['eff_add'] = -1;
        ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Berhasil mendaftar akun
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                // unset($_SESSION['eff_add']);
            } else if ($_SESSION['eff_add'] == 0) {
                $_SESSION['eff_add'] = -1;
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Gagal mendaftar akun!!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
                // unset($_SESSION['eff_add']);
            }
        }
        ?>

        <div class="row px-5">
            <div class="col-md-12">

            </div>
            <div class="col-md-12" style="background-color: rgb(255, 255, 255); border-radius: 20px;">
                <a href="">
                    <img src="../storages/gambar/logo2.png" alt="">
                </a><br>
                <form action="../controllers/select_data.php" method="POST">
                    <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="username_login" class="form-label">Username</label>
                        </div>
                        <div class="form-group col-md-auto">
                            <input type="text" class="form-control" name="username_login" value="<?= $username ?>" required="required">
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="kata_sandi" class="form-label">Kata Sandi</label>
                        </div>
                        <div class="form-group col-md-auto">
                            <input type="password" class="form-control" name="kata_sandi" value="<?= $sandi ?>" required="required">
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            Ingat Saya
                        </div>
                        <div class="form-group col-md-auto">
                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" name="rem_me" value="Remember Me" id="rem_me" <?= $rem_me ?>>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="submit" class="btn btn-secondary" value="Cancel" data-dismiss="modal"></input> -->
                    <div class="mb-3 text-center pt-5">
                        <input type="submit" class="btn btn-success" value="Sign In" name="sign_in" style="width:500px;"></input>
                    </div>
                    <div class="mb-3 text-center">
                        Belum punya akun? <a href="registrasi.php">Daftar akun disini</a>
                    </div>
                </form>
            </div>
            <div class="col-md-12">

            </div>
        </div>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

</body>

</html>