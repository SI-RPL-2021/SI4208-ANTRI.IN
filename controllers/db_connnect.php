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

function query_custom($query)
{
    global $conn;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
