<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>

<html lang="en">
    <head>
        <title>Social Network</title>
        <link rel="stylesheet", href="style.css">
    </head>

    <body>
        <div class="wrapper">
            <section class="message_page">
               <header>
                   <?php
                        include_once "php/config.php";
                        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                        if(mysqli_num_rows($sql)>0){
                         $row = mysqli_fetch_assoc($sql);
                         }
                   ?>
                    <div class="content">
                        <div class="details">
                            <span><?php echo $row['fname']. " ". $row['lname'] ?></span>
                            <p> <?php echo $row['status'] ?> </p>

                        </div>
                    </div>
                    
                </header>
                <div class="chat-box"> 

                </div>
                    <form action="#" class="typing_area" autocomplete="off">
                        <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>" hidden>
                         <input type="text" name="incoming_id" value="<?php echo $user_id ;?>" hidden>
                        <input type="text" name="message" class= "input-field" placeholder="Type message here...">
                        <button>Send</button>
                    </form>
                
            </section>
        </div>
        <a href="profile.php">Go to user profile</a>
        <script src="javascript/message_page.js"></script>
    </body>
    </html>