<?php
 function del_data($key_item){
    global $conn;
    // query("DELETE FROM `cart` WHERE `cart`.`id` = '$key_item'");
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

function edit_data($key_item){
    global $conn;
    $rs_row = query("SELECT * FROM `user` WHERE `id` = '$key_item'")[0];

    $id_num = $key_item;
    $nama = $_POST['prof_nama'];
    $email = $rs_row['email'];
    $handphone = $_POST['prof_hp'];
    $password = $_POST['prof_sandi1'];
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $query = '';

    if(empty($password)){
        $query = "UPDATE `user` set  
        `nama`='$nama', 
        `no_hp`='$handphone' WHERE `user`.`id`='$key_item' AND `user`.`email`='$email'";
    }else{
        $query = "UPDATE `user` set  
        `nama`='$nama',  
        `no_hp`='$handphone',
        `password` = '$hash_pass' WHERE `user`.`id`='$key_item' AND `user`.`email`='$email'";
    }

    // if(password_verify($password, $rs_row['password'])){
        
    // }else{
    //     echo "
    //         <script>
    //             alert('Wrong password');
    //             document.location.href = 'profile_beauty.php';
    //         </script>
    //     ";
    // }
    
    mysqli_query($conn, $query);
    $eff_rw = mysqli_affected_rows($conn);

    return $eff_rw;
}
?>