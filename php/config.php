<?php

    $conn = mysqli_connect("localhost", "root", "", "RTC_app");
    if(!$conn){
        echo "Connection failed" . mysqli_connect_error();
    }
?>