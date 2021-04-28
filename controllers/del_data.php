<?php
require_once 'db_connnect.php';
require_once 'select_data.php';

// delete specific doctor
if(isset($_GET['delp'])){
    $prod_id = $_GET['delp'];
    $_SESSION['eff_del_one'] = del_data_dokter($prod_id);
    header("Location: ../views/admins/adminDokter.php");
}

// delete pengguna
if(isset($_GET['delsr'])){
    $prod_id = $_GET['delsr'];
    $_SESSION['eff_del_one'] = del_data_pasien($prod_id);
    header("Location: ../views/admins/adminPengguna.php");
}

// delete hospital
if(isset($_GET['delrsh'])){
    $prod_id = $_GET['delrsh'];
    $_SESSION['eff_del_one'] = del_data_hospital($prod_id);
    header("Location: ../views/admins/adminRumahSakit.php");
}

// delete hospital
if(isset($_GET['delpl'])){
    $prod_id = $_GET['delpl'];
    $_SESSION['eff_del_one'] = del_data_poli($prod_id);
    header("Location: ../views/admins/adminPoliklinik.php?id_rs=".$_GET['id_rs']);
}

function del_data_dokter($key_item){
    global $conn;

    $query = "DELETE from `list_dokter` WHERE `list_dokter`.`id_dokter` = ?";
    $del_stmt_one = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($del_stmt_one, 'i', $key_item);
    mysqli_stmt_execute($del_stmt_one);
    // var_dump(mysqli_affected_rows($conn));
    $eff_rw = mysqli_affected_rows($conn);

    return $eff_rw;
    // if($eff_rw>0) {
    //     echo "
    //     <script>
    //         alert('Event deleted!!');
    //         document.location.href = 'home_event.php';
    //     </script>
    // ";
    // } else {
    //     echo "
    //     <script>
    //         alert('Event not deleted');
    //         document.location.href = 'home_event.php';
    //     </script>
    // ";
    // }
}

function del_data_hospital($key_item){
    global $conn;

    $query = "DELETE from `rumah_sakit` WHERE `rumah_sakit`.`id_rs` = ?";
    $del_stmt_one = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($del_stmt_one, 'i', $key_item);
    mysqli_stmt_execute($del_stmt_one);
    // var_dump(mysqli_affected_rows($conn));
    $eff_rw = mysqli_affected_rows($conn);
    
    return $eff_rw;
}

function del_data_poli($key_item){
    global $conn;

    $query = "DELETE from `poliklinik` WHERE `poliklinik`.`id_poli` = ?";
    $del_stmt_one = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($del_stmt_one, 'i', $key_item);
    mysqli_stmt_execute($del_stmt_one);
    // var_dump(mysqli_affected_rows($conn));
    $eff_rw = mysqli_affected_rows($conn);
    
    return $eff_rw;
}

function del_data_pasien($key_item){
    global $conn;

    $query = "DELETE from `pengguna` WHERE `pengguna`.`id_user` = ?";
    $del_stmt_one = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($del_stmt_one, 'i', $key_item);
    mysqli_stmt_execute($del_stmt_one);
    // var_dump(mysqli_affected_rows($conn));
    $eff_rw = mysqli_affected_rows($conn);
    
    return $eff_rw;
}

function del_data_apotek($key_item){
    global $conn;

    $query = "DELETE from `Apotek` WHERE `Apotek`.`id_apotek` = ?";
    $del_stmt_one = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($del_stmt_one, 'i', $key_item);
    mysqli_stmt_execute($del_stmt_one);
    // var_dump(mysqli_affected_rows($conn));
    $eff_rw = mysqli_affected_rows($conn);
    
    return $eff_rw;
}

function del_all_data(){
    global $conn;

    $query = "TRUNCATE TABLE 'tb_name'";
    $del_stmt = mysqli_prepare($conn, $query);
    
    // mysqli_stmt_bind_param($del_stmt);
    mysqli_stmt_execute($del_stmt);
    // var_dump(mysqli_affected_rows($conn));
    $eff_rw = mysqli_affected_rows($conn);
    
    return $eff_rw;
}

?>