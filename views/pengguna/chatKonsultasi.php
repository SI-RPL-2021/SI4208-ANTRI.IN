<?php require_once '../../controllers/select_data.php';
// $usr_prst = data_views("SELECT * FROM chat_online WHERE username = ?", $_SESSION['log_uname']);
$id_dok_akun = $_GET['id_dok_akun'];
$id_uname = $_SESSION['log_uname'];
$_SESSION['dok_id_chat'] = $id_dok_akun;
$usr_log = data_view("SELECT * FROM akun WHERE username = ?", $id_uname);
$dok_log = data_view("SELECT * FROM dokter_akun WHERE username = ?", $id_uname);
$akun_usr = $usr_log['id_akun'];
$_SESSION['usr_id_chat'] = $akun_usr;
$chat_data = chat_views("SELECT * FROM chat_online WHERE id_akun_chat = ? and id_dok_chat = ?", $akun_usr, $id_dok_akun);
// $result2 = data_views("SELECT * FROM chat_online WHERE id_dok_chat = ?", $_GET['id_dok_rsv']);
// $chat1 = data_views("SELECT * FROM chat_online WHERE id_dok_chat = ?", $id_dok_akun);
// $chat2 = data_views("SELECT * FROM chat_online WHERE id_dok_chat = ?", $_GET['id_dok_rsv']);
$chat_data = view_data("SELECT * FROM chat_online WHERE id_akun_chat = '$akun_usr' and id_dok_chat = '$id_dok_akun'");

$dok_data = data_view("SELECT * FROM list_dokter WHERE id_akun_dok = ?", $id_dok_akun);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Konsultasi Dokter</title>

    <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">
</head>

<body style="background-color: rgb(181, 240, 181);">
    <!--Navbar-->
    <div class="d-flex justify-content-between">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                &nbsp;&nbsp;&nbsp;
                <a class="navbar-brand" href="">
                    <img src="../../storages/gambar/logo.png" width="60" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="">
                                <h4>Konsultasi Dokter</h4>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="reservasi.php?id_dok_rsv=<?= $dok_data['id_dokter'] ?>" type="button" class="btn btn-danger">Cancel</a>
                &nbsp;&nbsp;
        </nav>
    </div>

    <!-- content -->
    <br><br><br><br>
    <div class="container" style="background-color: rgb(255, 255, 255); border-radius: 7px;">
        <table class="table table-dark table-borderless">
            <thead>
                <tr class="table-success">
                    <th scope="col" colspan="4">
                        <center>
                            Dr. <?= $dok_data['nama_dokter'] ?>
                        </center>
                        <img src="../../storages/gambar/wanita.png" alt="Avatar" style="width:50px;height:50px">
                    </th>
                </tr>
            </thead>
        </table>
        <?php
        foreach ($chat_data as $cht) {
        ?>
            <div class="card bg-dark text-white mb-2 px-5 py-4">
                <img src="../../storages/gambar/laki.png" alt="Avatar" style="width:50px;height:50px">
                <p><?= $cht['conversations'] ?></p>
                <!-- <span class="time-left">11:01</span> -->
                <small><?= $cht['time_cnvs'] ?></small>
            </div>
        <?php
        }
        ?>
        <div class="row">
            <!-- Form-->
            <form action="../../controllers/add_data.php" method="POST">
                <div class="col-md-11 mt-3">
                    <!-- <label for="exampleFormControlTextarea1" class="form-label">Tuliskan Chat</label> -->
                    <textarea class="form-control" id="chatOnlineTextArea" rows="3" name="online_convrst" placeholder="Tuliskan Chat disini"></textarea>
                </div>
                <div class="col-md-1 mt-3">
                    <input type="submit" class="btn btn-primary" value="Kirim" name="add_chat"></input>
                </div>
            </form>
        </div>
        <br>
    </div>
    <br><br><br>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>