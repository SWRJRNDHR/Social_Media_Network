<?php 
    session_start();
    include_once "config.php";
    $sql = mysqli_query($conn, "SELECT * FROM users");
    $output = "";
    if(mysqli_num_rows($sql) == 1){
        $output .= "No users are available right now";

    }elseif(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .=  $row['fname']. " " . $row['lname'];
        }
    }
    echo $output;
    
?>