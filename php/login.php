<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);
   
    if(!empty($email) && !empty($password)){

        if(isset($_POST['remember_me'])){
                setcookie('email_username',$_POST['email'],time() + (60*60*24),'/');
                setcookie('password',$_POST['password'],time() + (60*60*24),'/');
            }
            else{
                setcookie('email_username','',time() + (60*60*24),'/');
                setcookie('password','',time() + (60*60*24),'/');

            }
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}' AND password= '{$password}'");

        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "Chal raha hai!";
            
        }else{
            echo "Email or password is incorrect";
        }
    }else{

        echo "All fields are required";
    
    }


?>