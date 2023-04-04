<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<html lang="en">
    <head>
    </head>

    <body>
        <div align="center">
        <div class="wrapper">
            <section class="form login">
                <header>User Profile</header>
                <?php
                        include_once "php/config.php";
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                        if(mysqli_num_rows($sql) > 0){

                            $row = mysqli_fetch_assoc($sql);
                        }
                        ?>
                <form action="#">
                    <div class="error-txt"></div>
                    <div class="name_details">
                        
                    <div class="user_name">
                            <p>WELCOME</p>
                             <p><span><?php echo $row['fname']. " ". $row['lname'] ?></span></p>
                             

                        </div>
                            
                    <div class="email">

                           Email:    <span><?php echo $row['email'] ?></span>
                        </div>
                    <p>   
                     <div class="field button">
                            <a href="updateInformation.php">Update user information</a>
                        </div>
                
                    <a href="php/users.php">Message</a>
                        
                    <div class="field button">
                            <a href="php/logout.php">Logout</a>
                        </div>
                    </p>

                    </div>
                    <div class="field button">
                            <a href="php/logout.php">Logout</a>
                        </div>
                    </p>
                    </div>
                </form>
            </section>
        </div>
        </div>

    </body>
</html>
