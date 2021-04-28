<?php
require 'db_connnect.php';
require 'select_data.php';

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

    $query = "DELETE from `Poliklinik` WHERE `Poliklinik`.`id_poli` = ?";
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