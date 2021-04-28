<?php
$conn = mysqli_connect("localhost", "root", "", "antriin");
session_start();
$eff_rw = -1;

if (!$conn) {
    die("Can't connect bruh : " . mysqli_connect_error());
}

// log out
if (isset($_GET['out_log'])) {
    if ($_GET['out_log'] == 'zft') {
        unset($_SESSION['log_uname']);
        // unset($_SESSION['eff_add']);
        // unset($_SESSION['eff_del_one']);
        // unset($_SESSION['eff_del_all']);
        // session_destroy();
        header("Location: ../views/login.php");
    }
}

// // register
// if(isset($_POST["sign_up"])){
//     $_SESSION['eff_rw'] = add_data($_POST, '');
//     header("Location: login.php");
// }

// login
if (isset($_POST["sign_in"])) {
    $username = $_POST["username_login"];
    $pass = $_POST["kata_sandi"];
    $user_admin = fetch_results("SELECT * FROM admin WHERE username='$username'")[0];
    $user_normal = fetch_results("SELECT * FROM akun WHERE username='$username'")[0];
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
            header("Location: ../views/index.php");
        }
    } else {
        $_SESSION['eff_log'] = 0;
        header("Location: ../views/login.php");
    }

    // setcookie("username", $username, time()+ 86400,'/');
}

function fetch_results($query)
{
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

function query_custom($query)
{
    global $conn;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
