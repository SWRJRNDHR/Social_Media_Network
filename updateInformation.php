<?php
include_once "php/config.php";
session_start();
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE users set fname='" . $_POST['first_name'] . "', lname='" . $_POST['last_name'] . "', email='" . $_POST['email'] . "'  WHERE unique_id='" . $_POST['unique_id'] . "'");
$message = "Record Modified Successfully";
header("Location:profile.php");
}
                        include_once "php/config.php";
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                        if(mysqli_num_rows($sql) > 0){

                            $row = mysqli_fetch_assoc($sql);
                        }
                   ?>

<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>


</div>
Unique_id: <br>
<input type="hidden" name="unique_id" class="txtField" value="<?php echo $row['unique_id']; ?>">
<input type="text" name="unique_id"  value="<?php echo $row['unique_id']; ?>">
<br>

First Name: <br>
<input type="text" name="first_name" class="txtField" value="<?php echo $row['fname']; ?>">
<br>
Last Name :<br>
<input type="text" name="last_name" class="txtField" value="<?php echo $row['lname']; ?>">
<br>
Email:<br>
<input type="text" name="city_name" class="txtField" value="<?php echo $row['email']; ?>">
<br>
Password:<br>
<input type="text" name="email" class="txtField" value="<?php echo $row['password']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>