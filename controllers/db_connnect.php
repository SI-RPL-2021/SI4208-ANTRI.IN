<?php
    $conn = mysqli_connect("localhost", "root", "", "antriin_db");
    $eff_rw = -1;

    if(!$conn) {
		die("Can't connect bruh : ".mysqli_connect_error());
    }
?>