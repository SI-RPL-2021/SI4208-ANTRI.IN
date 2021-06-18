<?php
require '../../controllers/select_data.php';
$result = view_data("SELECT * FROM list_dokter");

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

    <title>Admin | Data Dokter</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
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
                        <a class="nav-link" href="adminIndex.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminApotek.php">Apotek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Dokter</a>
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
    <div class="container pt-5" style="background-color: white;">
        <br>
        <a href="" style="text-decoration:none; color:black;">
            <h1>DATA DOKTER</h1>
        </a>

        <?php
        // alert edit data
        if ($_SESSION['eff_add'] > 0 or $_SESSION['eff_edit'] > 0 or $_SESSION['eff_del_one'] > 0) {
            $_SESSION['eff_add'] = -1;
            $_SESSION['eff_del_one'] = -1;
            $_SESSION['eff_edit'] = -1;
        ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil mengubah data dokter
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        } else if ($_SESSION['eff_add'] == 0) {
            $_SESSION['eff_add'] = -1;
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Gagal mengubah data dokter!!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            // unset($_SESSION['eff_add']);
        }
        ?>

        <div class="card text-dark bg-light my-5" style="max-width: 100%;">
            <div class="card-header">
                <div class="row justify-content-between ml-2 mr-2">.
                    <a class="btn btn-success" href="tambahDokter.html">
                        Tambahkan Dokter baru
                        <!-- <span class="sr-only">(current)</span> -->
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="table_dr" class="table table-hover table-striped table-bordered table-light" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Specialis</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no_dr = 1;
                        foreach ($result as $item) { ?>
                            <tr>
                                <td><?php echo $no_dr ?></td>
                                <td><?php echo $item['nama_dokter'] ?></td>
                                <td><?php echo $item['spesialis'] ?></td>
                                <td><?php echo $item['no_telepon'] ?></td>
                                <td>
                                    <!-- <form action="add.php" method="post">
                <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                <button class="btn btn-light" type="submit">Edit</button>
                <button class="btn btn-danger btnDelete" type="button" data-id="<?php echo $item['id'] ?>">Delete</button>
                </form> -->
                                    <a href="editDokter.php?id_dok=<?= $item['id_dokter'] ?>" type="button" class="btn btn-primary">Edit</a>
                                    <a href="../../controllers/del_data.php?delp=<?= $item['id_dokter'] ?>" class="btn btn-danger align-items-center justify-content-center" role="button">Hapus</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_dr').DataTable();

            //   $('.btnDelete').click(function() {
            //     let id = $(this).data('id')
            //     if (confirm('Are you sure?')) {
            //       $.ajax({
            //         type: 'post',
            //         url: 'deleteUser.php',
            //         dataType: 'json',
            //         data: {
            //           id: id
            //         },
            //         success: function(response) {
            //           if (!response.status) {
            //             alert('Sorry, can\'t process')
            //             return false
            //           }

            //           window.location.reload()
            //         }
            //       })
            //     }
            //   })
        });
    </script>
</body>

</html>