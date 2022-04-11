<?php
    session_start();
    include_once "config.php";

    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($password)){
        $sql = "SELECT * FROM users where email = '{$email}' AND password = '{$password}' ";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>0){
            $row = mysqli_fetch_assoc($query);
            $status = "Active now";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2){
                $_SESSION['unique_id']=$row['unique_id'];
                echo "Success";
            }
        }
        else{
            echo "Email ID or password is incorrect";
        }
    }
    else{
        echo "All input fields are required.";
    }
?>
