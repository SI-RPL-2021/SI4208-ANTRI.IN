<?php
require 'db_connect.php';
require 'select_data.php';

function del_data_dokter($key_item){
    global $conn;
    view_data("DELETE FROM `List Dokter` WHERE `List Dokter`.`id_dokter` = '$key_item'");
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