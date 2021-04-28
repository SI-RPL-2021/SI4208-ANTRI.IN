<?php
require_once 'db_connnect.php';
require_once 'select_data.php';

// ubah dokter
if(isset($_POST["edit_dokter"])){
    $_SESSION['eff_edit'] = update_dokter($_POST, $_SESSION['id_no']);
    header("Location: ../views/admins/adminDokter.php");
}

function update_dokter($data, $id_dok){
    global $conn;
    // $rs_row = view_data("SELECT * FROM `list_dokter` WHERE id_dokter='$id_dok'")[0];
    $update_stmt = '';
    $query = '';

    $nama = $data['namaDokter'];
    $spesialis = $data['splDokter'];
    $telepon = $data['noHpDokter'];
    $query = "UPDATE `list_dokter` SET `nama_dokter`=?, `spesialis`=?, `no_telepon`=? WHERE `id_dokter`=?";

    $update_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($update_stmt,'sssi', $nama, $spesialis, $telepon, $id_dok);

    if(!empty($update_stmt)){
        mysqli_stmt_execute($update_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}
?>