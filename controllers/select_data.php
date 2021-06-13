<?php
require_once 'db_connnect.php';

function view_data($query){
    global $conn;

    $statementt = mysqli_prepare($conn, $query);
    mysqli_stmt_execute($statementt);
    $rows = [];
    $res = mysqli_stmt_get_result($statementt);

    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    return $rows;
}

function data_view($query, $id_data){
    global $conn;
    
    $statementt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statementt, 'i', $id_data);
    mysqli_stmt_execute($statementt);
    $reslt = mysqli_stmt_get_result($statementt);
    $getData = mysqli_fetch_assoc($reslt);

    return $getData;
}

function data_views($query, $id_data, $type_bnd='i'){
    global $conn;

    $statementt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($statementt, $type_bnd, $id_data);
    mysqli_stmt_execute($statementt);
    $reslt = mysqli_stmt_get_result($statementt);
    
    while($row = mysqli_fetch_assoc($reslt))
    {
        $rows[] = $row;
    }
    return $rows;
}

function insert_reservasi($data){
    global $conn;
    // $rs_row = view_data("SELECT * FROM `list_dokter`");
    $insert_stmt = '';
    $query = '';

    $id_rsvp = date("Y").date("m").date("d").date("H").date("i").strval(rand(100,999));
    $no_antrian = $_SESSION['line_number'];
    $id_usr = $_SESSION['usr_id_rsvp'];
    $id_dok = $_SESSION['dok_id_rsvp'];
    $id_rs = $_SESSION['rs_id_rsvp'];
    $query = "INSERT INTO `reservasi` VALUES (?,?,?,?,?)";

    $insert_stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($insert_stmt,'isiii', $id_rsvp, $no_antrian, $id_usr, $id_dok, $id_rs);

    if(!empty($insert_stmt)){
        mysqli_stmt_execute($insert_stmt);
    }else{var_dump('gagal');}

    $eff_rw = mysqli_affected_rows($conn);
    mysqli_close($conn);
    
    return $eff_rw;
}

//antrian
if (isset($_POST["get_antrian"])) {
    if(!empty($_SESSION['line_number'])){
        $_SESSION['line_number'] = $_SESSION['line_number'] + 1;
        $_SESSION['eff_add'] = insert_reservasi($_POST);
        unset($_SESSION['usr_id_rsvp']);
        unset($_SESSION['dok_id_rsvp']);
        unset($_SESSION['rs_id_rsvp']);
        header("Location: ../views/pengguna/historiReservasi.php");
    }
    else if(!empty($_COOKIE['line_number'])){
        $_SESSION['line_number'] = $_COOKIE['line_number'] + 1;
        $_SESSION['eff_add'] = insert_reservasi($_POST);
        unset($_SESSION['usr_id_rsvp']);
        unset($_SESSION['dok_id_rsvp']);
        unset($_SESSION['rs_id_rsvp']);
        header("Location: ../views/pengguna/historiReservasi.php"); 
    } else {
        $_COOKIE['line_number'] = -1;
        unset($_SESSION['usr_id_rsvp']);
        unset($_SESSION['dok_id_rsvp']);
        unset($_SESSION['rs_id_rsvp']);
        header("Location: ../views/pengguna/dokterList.php"); 
    }
}

// login
if (isset($_POST["sign_in"])) {
    $username = $_POST["username_login"];
    $pass = $_POST["kata_sandi"];
    $user_admin = data_views("SELECT * FROM admin WHERE `username` = ?", $username, 's')[0];
    $user_normal = data_views("SELECT * FROM akun WHERE `username` = ?", $username, 's')[0];
    $id_akn_usr = $user_normal['id_akun'];
    $pngg = data_view("SELECT * FROM pengguna WHERE id_akun = ?", $id_akn_usr);
    // $username = $user['username'];
    $user_tp = '';

    // var_dump($user_admin);
    // print_r($user_admin);
    // var_dump($user_normal);
    // var_dump(password_hash('coba_password_disini', PASSWORD_DEFAULT));
    if (!empty($user_admin)) {
        $user_tp = 'admin';
        $user = $user_admin;
    } else if (!empty($user_normal)) {
        $user_tp = 'normal';
        $user = $user_normal;
    }

    if (password_verify($pass, $user['password'])) {
        $_SESSION['log_uname'] = $username;
        if ($user_tp == "admin") {
            $_SESSION['log_fname'] = $username;
        } else{
            $_SESSION['log_fname'] = $pngg['nama_lengkap'];
        }
        $_SESSION['eff_log'] = 1;

        if (!isset($_POST['rem_me'])) {
            setcookie('log_uname_user', '', 0, '/');
            setcookie('log_pass_user', '', 0, '/');
            setcookie('log_rem_me', '', 0, '/');
        } else {
            setcookie('log_uname_user', $username, time() + 86400 * 30, '/');
            setcookie('log_pass_user', $pass, time() + 86400 * 30, '/');
            setcookie('log_rem_me', 'checked', time() + 86400 * 30, '/');
        }

        if ($user_tp == "admin") {
            header("Location: ../views/admins/adminRumahSakit.php");
        } else {
            header("Location: ../views/pengguna/rumahSakit.php");
        }
    } else {
        $_SESSION['eff_log'] = 0;
        unset($_SESSION['log_fname']);
        unset($_SESSION['log_uname']);
        header("Location: ../views/login.php");
    }

    // setcookie("username", $username, time()+ 86400,'/');
}
