<?php
require 'db_connect.php';
require 'select_data.php';

function insert_dokter($data, $user_id){
    global $conn;
    // $rs_row = view_data("SELECT * FROM `list_dokter`");
    $insert_stmt = '';
    $query = '';

    $id_dok = 0;
    $nama = '';
    $spesialis = '';
    $telepon = '';

    $id_dok = date("d").strval(rand(100,999)).date("H").date("i");
    $nama = $data['nama_dokter'];
    $spesialis = $data['spesialis_dokter'];
    $telepon = $data['telepon_dokter'];
    $query = "INSERT INTO `list_dokter` VALUES (?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'isss', $id_dok, $nama, $spesialis, $telepon);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    // mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

?>