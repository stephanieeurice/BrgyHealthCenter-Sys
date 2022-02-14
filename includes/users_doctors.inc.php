<?php
    session_start();
    include_once "db.inc.php";
    $outgoing_id = $_SESSION['unique_id'];
    $results = mysqli_query($conn, "SELECT * FROM patient WHERE NOT unique_id = {$outgoing_id}");
    $output = "";

    if (mysqli_num_rows($results) == 1) {
        $output .= "No users are available to chat";
    } elseif (mysqli_num_rows($results) > 0) {
        include "data_doctors.inc.php";
    }
    echo $output;
?>