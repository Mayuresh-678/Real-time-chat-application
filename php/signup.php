<?php
    session_start();
    include_once "config.php";

    $fname= mysqli_real_escape_string($conn, $_POST['fname']);
    $lname= mysqli_real_escape_string($conn, $_POST['lname']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){      
       if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT email FROM users where email = '{$email}' ");
            if(mysqli_num_rows($sql)>0){
                echo "$email - This email is already exist.";
            }
            else{
                $img_name= $_FILES['image']['name'];
                $img_type=$_FILES['image']['type'];
                $tmp_name=$_FILES['image']['tmp_name'];
                $img_size = $_FILES['image']['size'];
                
                if($img_size === 0){
                    echo "Please select an image file!";
                }
                else{
                    $img_explode=explode('.', $img_name);
                    $img_ext=end($img_explode);

                    $extensions=['png', 'jpg', 'jpeg'];

                    if(in_array($img_ext, $extensions) === true){
                        $time=time();
                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name, 'profile_photo/'.$new_img_name)){
                            $status = "Active now";
                            $random_id = rand(time(),10000000);

                            $sql_2= mysqli_query($conn, "INSERT INTO  users (unique_id, fname, lname, email, password, img, status) VALUES ('{$random_id}','{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql_2){
                                $sql_3= mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql_3)>0){
                                    $row = mysqli_fetch_assoc($sql_3);
                                    $_SESSION['unique_id']=$row['unique_id'];
                                    echo "Success";
                                }
                            }
                            else{
                                echo "Something went wrong";
                            }
                        }
                    }
                    else{
                        echo "Please select image file in - png, jpg, jpeg";
                    }

                }
            }
        }
        else{
            echo "Please enter correct Email address.";
        } 
    }
    else{
        echo "All input fields are required!";
    }
?>