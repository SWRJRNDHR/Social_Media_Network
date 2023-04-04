<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
 
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
    } 
    else{
        $password = md5($password);
    
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        #echo "executing";
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT email from users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)>0){
                echo "$email This email already exist"; 
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    
                    $extension = ['png', 'jpg', 'jpeg'];
                    if(in_array($img_ext, $extension)){
                        $time = time();

                        
                        $new_image_name = $time.$img_name;
                        
                        if(move_uploaded_file($tmp_name, "profile_images/".$new_image_name)){

                            #echo "inside upload";

                            $status = "Active";
                            $random_id = rand(time(),10000000);

                           $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname,lname,email,password,image,status)
                                                VALUES({$random_id},'{$fname}','{$lname}','{$email}', '{$password}', '{$new_image_name}','{$status}')");

                            if($sql2){

                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3)>0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "Chal raha hai!";

                                
                                }

                            }else{
                                echo "Kuch to gadbad hai!";
                            }
                        }
                        
                    }else{
                        echo "please select correct file";

                    }
                }
            }

        }else{
            echo "\n '$email' ye email galat hai";
        }
    }else{
        
        echo "sab information daal bhenchod";
    }
}

?>
