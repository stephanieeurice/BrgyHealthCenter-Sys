<?php
    session_start();
    include_once "db.inc.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql2 = mysqli_query($conn, "SELECT * FROM doctor WHERE NOT unique_id = {$outgoing_id}");
    $output = "";

    if (mysqli_num_rows($sql2) == 1) {
        $output .= "No users are available to chat";
    } elseif (mysqli_num_rows($sql2) > 0) {
        include "data_patients.inc.php";
    }
    echo $output;
?>