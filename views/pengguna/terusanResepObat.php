<?php require_once '../../controllers/select_data.php';
$id_usr_rsvp = $_SESSION['log_uname'];
$apotek = view_data("SELECT DISTINCT nama_apotek FROM apotek");
$resep_obt = view_data("SELECT * FROM resep_obat");
// $id_akun_rsvp = $usr_rsvp['id_akun'];
// $usr_rsvp = data_view("SELECT * FROM pengguna WHERE id_akun = ?", $id_akun_rsvp);
// $id_rsvp = $usr_rsvp['id_user'];
// $result = data_views("SELECT * FROM reservasi WHERE id_user = ?", $id_rsvp);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Apotek</title>

  <link rel="icon" href="../../storages/gambar/logo.png" type="image/png" sizes="128x128">
</head>

<body style="background-color: rgb(181, 240, 181);">

  <!--Container body-->
  <br>

  <div class="container pt-2 mt-2" style="background-color: white; border-radius: 6px;">
    <a href="">
      <h1 style="text-align: center;">Resep Obat</h1>
    </a>
    <br>

    <div class="container">
      <div class="row">
        <form action="../../controllers/add_data.php" method="POST">
          <div class="col-6">
            <div class="row mb-3">
              <label for="cats" class="form-label">Apotek</label>

              <select name="apotek_id" id="cats" class="form-control">
                <?php
                foreach ($apotek as $pk) {
                ?>
                  <?= $pk['nama_apotek'] ?>
                  <option value="<?= $pk['id_apotek'] ?>"><?= $pk['nama_apotek'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="row mb-3">
              <label for="obatttt" class="form-label">Obat</label>
              <input type="text" class="form-control" id="obatttt" name="obat_pasien">
            </div>
          </div>
      </div>
    </div>

    <br>

    <div class="container">
      <!-- <div class="card-group">
                    <div class="card">
                      <img class="card-img-top" style="object-fit: cover;" src="../../storages/gambar/mgrip.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Nama obat: Mixagrip</h5>
                        <p class="card-text">Pemakaian: 3x1</p>   
                        <p class="card-text">Harga: Rp50.000</p>                      
                      </div>
                    </div>
                    <div class="card">
                      <img class="card-img-top" style="object-fit: cover;" src="../../storages/gambar/promag.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Nama obat: Promag</h5>
                        <p class="card-text">Pemakaian: 3x1</p>
                        <p class="card-text">Harga: Rp10.000</p> 
                      </div>
                    </div>
                    <div class="card">
                      <img class="card-img-top" style="object-fit: cover;" src="../../storages/gambar/bodrex.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Nama obat: Bodrex </h5>
                        <p class="card-text">Pemakaian: 1x2</p>   
                        <p class="card-text">Harga: Rp14.000</p>                     
                      </div>
                    </div> 
                  </div>  -->
    </div>

    <br>
    <div class="row">
      <div class="col-md-6">
        <a href="historiReservasi.php" type="button" class="btn btn-danger">Cancel</a>
      </div>
      <div class="col-md-6">

        <input type="submit" class="btn btn-primary" value="Checkout" name="add_resep"></input>
        <!-- <input type="hidden" class="form-control" id="rsvvvvv" name='rsvp_edited_id' value=<?= $item['id_reservasi'] ?>> -->
        </form>
      </div>
    </div>

    <br><br>

  </div>

</body>

</html>