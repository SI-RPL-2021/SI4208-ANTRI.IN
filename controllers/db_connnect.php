<?php
$conn = mysqli_connect("localhost", "root", "", "antriin");
session_start();
$eff_rw = -1;

if (!$conn) {
    die("Can't connect bruh : " . mysqli_connect_error());
}
// var_dump(password_hash('i dont know this', PASSWORD_DEFAULT));
setcookie('line_number', 1, time() + 3600 * 15, '/');

// log out
if (isset($_GET['out_log'])) {
    if ($_GET['out_log'] == 'zft') {
        unset($_SESSION['log_uname']);
        // unset($_SESSION['eff_add']);
        // unset($_SESSION['eff_del_one']);
        // unset($_SESSION['eff_del_all']);
        // session_destroy();
        if (isset($_SESSION['usr_id_chat'])){
            unset($_SESSION['usr_id_chat']);
        }
        if (isset($_SESSION['dok_id_chat'])){
            unset($_SESSION['dok_id_chat']);
        }
        header("Location: ../views/login.php");
    }
}

function query_custom($query)
{
    global $conn;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
