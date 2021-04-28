<?php
require 'db_connnect.php';

function view_data($query){
    global $conn;

    $res = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($res)){
        $rows [] = $row;
    }
    return $rows;
}

?>