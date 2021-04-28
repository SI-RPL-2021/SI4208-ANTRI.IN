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

// login
if (isset($_POST["sign_in"])) {
    $username = $_POST["username_login"];
    $pass = $_POST["kata_sandi"];
    $user_admin = view_data("SELECT * FROM admin WHERE username='$username'")[0];
    $user_normal = view_data("SELECT * FROM akun WHERE username='$username'")[0];
    // $username = $user['username'];
    $user_tp = '';

    var_dump($user_admin);
    // print_r($user_admin);
    var_dump($user_normal);
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
            header("Location: ../views/pengguna/reservasi.php");
        }
    } else {
        $_SESSION['eff_log'] = 0;
        unset($_SESSION['log_uname']);
        header("Location: ../views/login.php");
    }

    // setcookie("username", $username, time()+ 86400,'/');
}


?>