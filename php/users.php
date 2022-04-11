<?php

    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * from users WHERE NOT unique_id = {$outgoing_id}");
    $output = "";
    $num_row = mysqli_num_rows($sql);

    if($num_row == 1){
        $output .= "No users are available to chat.";
    }
    elseif($num_row > 0){
        include "data.php";
    }
    echo $output;

?>