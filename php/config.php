<?php
    #$conn = mysqli_connect("128.199.53.240","root","","social_network");
    $conn = mysqli_connect("localhost","root","","social_network");
    
    if($conn){
        #echo "Database connected";
    }else{
        echo "nahi chalat bc";
    }
$error="";
?>